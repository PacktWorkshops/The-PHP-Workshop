<?php

namespace Tests;

use Components\Database;
use Models\User;
use PDO;
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    /**
     * @var Database
     */
    private static $db;

    public static function setUpBeforeClass(): void
    {
        $pdo = new PDO('mysql:host=mysql-host;port=3306;dbname=;charset=utf8mb4', "php-user", "php-pass", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
        $pdo->exec('create schema if not exists test;');
        $pdo->exec('use test;');
        $pdo->exec(file_get_contents(__DIR__ . '/../db/setUp.sql'));
        self::$db = new class ($pdo) extends Database
        {
            /** @noinspection PhpMissingParentConstructorInspection */
            public function __construct(PDO $pdo = null)
            {
                $this->pdo = $pdo;
            }
        };
        var_dump(self::$db->pdo);
    }

    public static function tearDownAfterClass(): void
    {
        self::$db->pdo->exec('truncate table users');
        self::$db->pdo->exec('truncate table contacts');
    }

    public function testGetInsertUser()
    {
        $user = self::$db->getUserById(1);
        $this->assertNull($user);
        $password = 'myPassword';
        $insertTime = gmdate('Y-m-d H:i:s');
        $stmt = self::$db->addUser('alex', $password);
        $this->assertEquals($stmt->errorCode(), '00000');
        $this->assertTrue($stmt->rowCount() === 1);
        $this->assertSame('1', self::$db->pdo->lastInsertId());
        $user = self::$db->getUserById(1);
        $expectedUser = new User([
            'id' => 1,
            'username' => 'alex',
            'password' => 'N/A',
            'signup_time' => $insertTime,
        ]);
        $this->assertEquals($expectedUser->getId(), $user->getId());
        $this->assertEquals($expectedUser->getUsername(), $user->getUsername());
        $this->assertTrue($user->passwordMatches($password));
        // allow max. one second difference from operation start time to insert time
        $singupTimeDiff = $user->getSignupTime()->diff($expectedUser->getSignupTime());
        $this->assertEquals('0', $singupTimeDiff->format('%a'));
        $this->assertEquals('0', $singupTimeDiff->format('%h'));
        $this->assertEquals('0', $singupTimeDiff->format('%i'));
        $this->assertTrue($singupTimeDiff->format('%s') <= 1);

        $userbyUsername = self::$db->getUserByUsername('alex');
        $this->assertEquals($user, $userbyUsername);
    }

    /**
     * @depends testGetInsertUser
     */
    public function testGetAddContacts()
    {
        $ownContactsStmt = self::$db->getOwnContacts(1);
        $this->assertEquals(0, $ownContactsStmt->rowCount());

        $addStmt = self::$db->addContact(1, 'Lana', 'lana@some.com', '+351', 'address/No.');
        $this->assertEquals(1, $addStmt->rowCount());
        $this->assertEquals('00000', $addStmt->errorCode());

        $addStmt = self::$db->addContact(2, 'Another Lana', 'another.lana@some.com', '+351', 'address/No.');
        $this->assertEquals(1, $addStmt->rowCount());
        $this->assertEquals('00000', $addStmt->errorCode());

        $ownContactsStmt = self::$db->getOwnContacts(1);
        $this->assertEquals(1, $ownContactsStmt->rowCount());
        $this->assertEquals([
            'id' => '1',
            'user_id' => '1',
            'name' => 'Lana',
            'phone' => '+351',
            'email' => 'lana@some.com',
            'address' => 'address/No.',
        ], $ownContactsStmt->fetch(PDO::FETCH_ASSOC));
    }

    /**
     * @depends testGetAddContacts
     */
    public function testGetOwnContactById()
    {
        $ownContact = self::$db->getOwnContactById(1, 1);
        $this->assertIsArray($ownContact);

        $ownContact = self::$db->getOwnContactById(1, 2);
        $this->assertNull($ownContact);
    }

    /**
     * @depends testGetAddContacts
     */
    public function testUpdateOwnContact()
    {
        $stmt = self::$db->updateContact(1, 1, 'Lana', 'lana@another.email.com', '', '');
        $this->assertEquals(1, $stmt->rowCount());

        $stmt = self::$db->updateContact(2, 1, 'Lana', 'lana@another.email.com', '', '');
        $this->assertEquals(0, $stmt->rowCount());

        $ownContact = self::$db->getOwnContactById(1, 1);
        $this->assertIsArray($ownContact);
        $this->assertEquals('lana@another.email.com', $ownContact['email']);
        $this->assertEmpty($ownContact['phone']);
        $this->assertEmpty($ownContact['address']);
    }

    /**
     * @depends testGetAddContacts
     */
    public function testDeleteOwnContact()
    {
        $stmt = self::$db->deleteOwnContactById(1, 1);
        $this->assertEquals(1, $stmt->rowCount());

        $stmt = self::$db->deleteOwnContactById(1, 2);
        $this->assertEquals(0, $stmt->rowCount());
    }
}
