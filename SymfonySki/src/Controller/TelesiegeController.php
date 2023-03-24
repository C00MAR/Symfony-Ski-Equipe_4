<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Telesiege;

class TelesiegeController extends AbstractController
{
    public function createDefaultTelesiege(EntityManagerInterface $em): Response
    {
        $defaultTelesiege = new Telesiege();
        $defaultTelesiege->setName('Telesiege 3')
            ->setOpenHour(new \DateTime('08:30'))
            ->setCloseHour(new \DateTime('16:30'))
            ->setFermeture(false)
            ->setFermetureMessage('');

        $em->persist($defaultTelesiege);
        $em->flush();

        return new Response('Nouveau telesiege créé avec succès !');
    }
}
