<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Telesiege;
use Doctrine\ORM\EntityManagerInterface;

class AccountController extends AbstractController
{

#[Route('/account', name: 'account')]
public function index(EntityManagerInterface $em): Response
{
    $user = $this->getUser();
    $telesieges = $em->getRepository(Telesiege::class)->findAll();

    return $this->render('account/index.html.twig', [
        'controller_name' => 'AccountController',
        'user' => $user,
        'telesieges' => $telesieges,
    ]);
}



}
