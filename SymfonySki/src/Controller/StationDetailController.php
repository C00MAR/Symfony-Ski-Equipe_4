<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StationDetailController extends AbstractController
{
    #[Route('/station/detail', name: 'app_station_detail')]
    public function index(): Response
    {
        return $this->render('station_detail/index.html.twig', [
            'controller_name' => 'StationDetailController',
        ]);
    }
}
