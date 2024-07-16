<?php

namespace App\Tests;

use App\Entity\Player;
use App\Entity\Team;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PlayerTest extends KernelTestCase
{
    public function testPlayerCreation()
    {
        $team = new Team();
        $team->setName('Test Team');
        $team->setCreatedAt(new \DateTime());

        $player = new Player();
        $player->setFirstName('John');
        $player->setLastName('Doe');
        $player->setPosition('Forward');
        $player->setAge(25);
        $player->setTeamId($team);

        $this->assertSame('John', $player->getFirstName());
        $this->assertSame('Doe', $player->getLastName());
        $this->assertSame('Forward', $player->getPosition());
        $this->assertSame(25, $player->getAge());
        $this->assertSame($team, $player->getTeamId());
    }
}
