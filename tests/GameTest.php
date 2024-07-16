<?php

namespace App\Tests;

use App\Entity\Game;
use App\Entity\League;
use App\Entity\Team;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class GameTest extends KernelTestCase
{
    public function testGameCreation()
    {
        $league = new League();
        $league->setName('Test League');
        $league->setCreatedAt(new \DateTime());

        $homeTeam = new Team();
        $homeTeam->setName('Home Team');
        $homeTeam->setCreatedAt(new \DateTime());

        $awayTeam = new Team();
        $awayTeam->setName('Away Team');
        $awayTeam->setCreatedAt(new \DateTime());

        $game = new Game();
        $game->setHomeTeam($homeTeam);
        $game->setAwayTeam($awayTeam);
        $game->setHomeTeamScore(3);
        $game->setAwayTeamScore(2);
        $game->setDate(new \DateTime());
        $game->setLeague($league);

        $this->assertSame($homeTeam, $game->getHomeTeam());
        $this->assertSame($awayTeam, $game->getAwayTeam());
        $this->assertSame(3, $game->getHomeTeamScore());
        $this->assertSame(2, $game->getAwayTeamScore());
        $this->assertInstanceOf(\DateTime::class, $game->getDate());
        $this->assertSame($league, $game->getLeague());
    }
}
