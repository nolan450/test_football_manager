<?php

namespace App\Controller;

use App\Entity\League;
use App\Entity\User;
use App\Repository\LeagueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;

class LeagueController extends AbstractController
{
    #[Route('/league', name: 'app_league')]
    public function index(LeagueRepository $leagueRepository): JsonResponse
    {
        $leagues = $leagueRepository->findAll();
        return $this->json($leagues);
    }

    #[Route('/league/{id}', name: 'app_league_show')]
    public function show($id, EntityManagerInterface $em): JsonResponse
    {
        $league = $em->getRepository(League::class)->find($id);

        if (!$league) {
            throw new NotFoundHttpException('League not found');
        }

        return $this->json($league);
    }

    #[Route('/league', name: 'app_league_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $league = new League();
        $league->setName($data['name']);
        $user = $em->getRepository(User::class)->find($data['user_id']);
        $league->setUser($user);
        $league->setCreatedAt(new \DateTime());

        $em->persist($league);
        $em->flush();

        return $this->json($league, 201);
    }
}
