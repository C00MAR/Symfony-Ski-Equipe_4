<?php

namespace App\Controller;

use App\Repository\StationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StationController extends AbstractController
{
    #[Route('/station', name: 'app_station')]
    public function index(StationRepository $stationRepository): Response
    {
        $stations = $stationRepository->findAll();

        return $this->render('station/index.html.twig', [
            'stations' => $stations,
        ]);
    }
}
