<?php

namespace App\Tests;

use App\Entity\Team;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class TeamTest extends KernelTestCase
{
    public function testTeamCreation()
    {
        $user = new User();
        $user->setUsername('testuser');
        $user->setEmail('test@example.com');
        $user->setPassword('password');

        $team = new Team();
        $team->setName('Test Team');
        $team->setUserId($user);
        $team->setCreatedAt(new \DateTime());

        $this->assertSame('Test Team', $team->getName());
        $this->assertSame($user, $team->getUserId());
        $this->assertInstanceOf(\DateTime::class, $team->getCreatedAt());
    }
}
