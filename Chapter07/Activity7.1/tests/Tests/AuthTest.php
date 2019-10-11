<?php

namespace Tests;

use Components\Auth;
use PHPUnit\Framework\TestCase;

class AuthTest extends TestCase
{
    public function testUserIsAuthenticated()
    {
        $this->assertFalse(Auth::userIsAuthenticated());
        $_SESSION['userid'] = 12345;
        $this->assertTrue(Auth::userIsAuthenticated());
        $_SESSION['userid'] = -1;
        $this->assertTrue(Auth::userIsAuthenticated());
        $_SESSION['userid'] = 'dummy';
        $this->assertTrue(Auth::userIsAuthenticated());
        $_SESSION['userid'] = false;
        $this->assertTrue(Auth::userIsAuthenticated());
        $_SESSION['userid'] = null;
        $this->assertFalse(Auth::userIsAuthenticated());
        unset($_SESSION['userid']);
        $this->assertFalse(Auth::userIsAuthenticated());
    }

    public function testGetLastLogin()
    {
        $_SESSION['loginTime'] = $timestamp = time();
        $this->assertEquals(date(DATE_ISO8601, $timestamp), Auth::getLastLogin()->format(DATE_ISO8601));
        unset($_SESSION['loginTime']);
        $this->expectException(\TypeError::class);
        Auth::getLastLogin();
    }

    public function testAuthenticate()
    {
        Auth::authenticate(123);
        $this->assertTrue(Auth::userIsAuthenticated());
        $this->assertInstanceOf(\DateTime::class, Auth::getLastLogin());
    }

    /**
     * @runInSeparateProcess
     */
    public function testLogout()
    {
        session_start();
        $this->assertTrue(session_status() === PHP_SESSION_ACTIVE);
        $sessionId = session_id();
        Auth::authenticate(123);
        $this->assertTrue(Auth::userIsAuthenticated());
        $this->assertInstanceOf(\DateTime::class, Auth::getLastLogin());
        Auth::logout();
        $this->assertNotEquals(session_id(), $sessionId);
        $this->assertFalse(Auth::userIsAuthenticated());
    }
}