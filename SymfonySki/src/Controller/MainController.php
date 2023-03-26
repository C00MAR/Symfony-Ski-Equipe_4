<?php

namespace App\Controller;

use App\Repository\StationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function index(StationRepository $stationsRepository): Response
    {
        $stations = $stationsRepository->findAll();
        return $this->render('page/index.html.twig', [
            'stations' => $stations
        ]);
    }

    #[Route('/station/{id}', name: 'app_station')]
    public function station($id, StationRepository $stationsRepository): Response
    {
        $station = $stationsRepository->find($id);

        if (!$station) {
            throw $this->createNotFoundException('station not found');
        }

        return $this->render('main/station.html.twig', [
            'stations' => $station
        ]);
    }

    #[Route('/event/{id}', name: 'app_event')]
    public function product($id, ProductRepository $productsRepository): Response
    {
        $product = $productsRepository->find($id);

        if (!$product) {
            throw $this->createNotFoundException('Event not found');
        }

        return $this->render('main/detail-event.html.twig', [
            'product' => $product,
        ]);
    }
}
