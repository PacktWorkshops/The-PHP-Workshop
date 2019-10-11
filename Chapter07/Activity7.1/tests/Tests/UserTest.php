<?php

namespace Tests;

use Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testEmptyUser()
    {
        $user = new User([]);
        $this->assertEquals(0, $user->getId());
        $this->assertEquals('', $user->getUsername());
        $this->assertInstanceOf(\DateTime::class, $user->getSignupTime());
    }

    public function testUserData()
    {
        $username = 'alex';
        $password = 'randomPass';
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $signupTime = '2019-02-03 14:15:16';
        $user = new User([
            'id' => 123,
            'username' => $username,
            'password' => $passwordHash,
            'signup_time' => $signupTime,
        ]);

        $this->assertEquals(123, $user->getId());
        $this->assertEquals($username, $user->getUsername());
        $this->assertInstanceOf(\DateTime::class, $user->getSignupTime());
        $this->assertEquals($signupTime, $user->getSignupTime()->format('Y-m-d H:i:s'));
        $this->assertTrue($user->passwordMatches($password));
        $this->assertFalse($user->passwordMatches($password . 'extra'));
    }
}