<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserCreation()
    {
        $user = new User();
        $user->setUsername('testuser');
        $user->setEmail('test@example.com');
        $user->setPassword('password');

        $this->assertSame('testuser', $user->getUsername());
        $this->assertSame('test@example.com', $user->getEmail());
        $this->assertSame('password', $user->getPassword());
    }
}
