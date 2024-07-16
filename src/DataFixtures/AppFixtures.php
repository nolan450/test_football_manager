<?php

namespace App\DataFixtures;

use App\Entity\League;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('leagueManager');
        $user->setEmail('manager@example.com');
        $user->setPassword('password');
        $manager->persist($user);

        $league = new League();
        $league->setName('Premier League');
        $league->setUser($user);
        $league->setCreatedAt(new \DateTime());
        $manager->persist($league);

        $manager->flush();
    }
}

