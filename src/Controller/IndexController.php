<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\SalonsRepository;
use App\Repository\TurnoverRepository;
use Symfony\Component\Serializer\SerializerInterface;

final class IndexController extends AbstractController
{
    #[Route('/index', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    // Get all salons
    #[Route('/salons', name: 'app_salons')]
    public function getSalons(
        SalonsRepository $salonsRepository,
        SerializerInterface $serializer
    ): JsonResponse
    {
       $data = $salonsRepository->findAll();
       $jsonData = $serializer->serialize($data, 'json', ['groups' => 'salons:read']);
       return new JsonResponse($jsonData, 200, [], true);
    }

    // Get all turnover records
    #[Route('/turnover', name: 'app_turnover')]
    public function getTurnover(
        TurnoverRepository $turnoverRepository,
        SerializerInterface $serializer
    ): JsonResponse
    {
       $data = $turnoverRepository->findAll();
       $jsonData = $serializer->serialize($data, 'json', ['groups' => 'turnover:read']);
       return new JsonResponse($jsonData, 200, [], true);
    }


}
