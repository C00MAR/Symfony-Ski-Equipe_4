<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Telesiege;
use App\Entity\Station;
use App\Form\TelesiegeType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;

class TelesiegeController extends AbstractController
{
    public function createDefaultTelesiege(EntityManagerInterface $em): Response
{
    $station = $em->getRepository(Station::class)->find(1); // Récupère l'objet Station avec l'identifiant 1

    $defaultTelesiege = new Telesiege();
    $defaultTelesiege->setName('Telesiege 3')
        ->setOpenHour(new \DateTime('08:30'))
        ->setCloseHour(new \DateTime('16:30'))
        ->setFermeture(false)
        ->setFermetureMessage('')
        ->setStation($station); // Associe le Telesiege à la Station avec l'identifiant 1

    $em->persist($defaultTelesiege);
    $em->flush();

    return new Response('Nouveau telesiege créé avec succès !');
}

}
