<?php

namespace App\Tests;

use App\Entity\Game;
use App\Entity\League;
use App\Entity\Team;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class LeagueCreationTest extends KernelTestCase
{
    public function testLeagueCreationAndMatches()
    {
        $kernel = self::bootKernel();
        $entityManager = $kernel->getContainer()->get('doctrine')->getManager();

        // Step 1: Create a User
        $user = new User();
        $user->setUsername('leagueManager');
        $user->setEmail('manager@example.com');
        $user->setPassword('password');
        $entityManager->persist($user);

        // Step 2: Create a League
        $league = new League();
        $league->setName('Premier League');
        $league->setUser($user);
        $league->setCreatedAt(new \DateTime());
        $entityManager->persist($league);

        // Step 3: Create Teams
        $teamNames = ['Team A', 'Team B', 'Team C', 'Team D'];
        $teams = [];

        foreach ($teamNames as $name) {
            $team = new Team();
            $team->setName($name);
            $team->setUserId($user);
            $team->setCreatedAt(new \DateTime());
            $entityManager->persist($team);
            $teams[] = $team;
        }

        // Step 4: Create Matches
        $matchDates = [
            new \DateTime('2024-08-01'),
            new \DateTime('2024-08-02'),
            new \DateTime('2024-08-03'),
            new \DateTime('2024-08-04')
        ];

        for ($i = 0; $i < count($teams); $i += 2) {
            $game = new Game();
            $game->setHomeTeam($teams[$i]);
            $game->setAwayTeam($teams[$i + 1]);
            $game->setHomeTeamScore(rand(0, 5));
            $game->setAwayTeamScore(rand(0, 5));
            $game->setDate($matchDates[$i / 2]);
            $game->setLeague($league);
            $entityManager->persist($game);
        }

        // Flush to save all entities
        $entityManager->flush();

        // Assertions
        $this->assertCount(1, $entityManager->getRepository(League::class)->findAll());
        $this->assertCount(4, $entityManager->getRepository(Team::class)->findAll());
        $this->assertCount(2, $entityManager->getRepository(Game::class)->findAll());

        // Clean up the database after the test
        $entityManager->remove($game);
        foreach ($teams as $team) {
            $entityManager->remove($team);
        }
        $entityManager->remove($league);
        $entityManager->remove($user);
        $entityManager->flush();
    }
}
