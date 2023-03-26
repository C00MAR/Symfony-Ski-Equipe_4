<?php

namespace App\Controller;

use App\Entity\Telesiege;
use App\Entity\Piste;
use App\Form\TelesiegeType;
use App\Form\PisteType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{

    #[Route('/account', name: 'account')]
    public function index(EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        $telesieges = $em->getRepository(Telesiege::class)->findBy(['station' => $user]);
        $pistes = $em->getRepository(Piste::class)->findBy(['station' => $user]);

        return $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
            'user' => $user,
            'telesieges' => $telesieges,
            'pistes' => $pistes,
        ]);
    }


    #[Route('/telesiege/add', name: 'add_telesiege')]
    public function addTelesiege(Request $request, ManagerRegistry $registry): Response
    {
        $telesiege = new Telesiege();
        $telesiege->setStation($this->getUser()); 
        $station = $this->getUser(); // ou $entityManager->getRepository(Station::class)->find($id);
        $form = $this->createForm(TelesiegeType::class, $telesiege, [
            'station' => $station,
            'user' => $this->getUser(),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $registry->getManager();
            $entityManager->persist($telesiege);
            $entityManager->flush();

            return $this->redirectToRoute('account');
        }

        return $this->render('account/add_telesiege.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/piste/add', name: 'add_piste')]
    public function addPiste(Request $request, ManagerRegistry $registry): Response
    {
        $piste = new Piste();
        $piste->setStation($this->getUser()); 
        $station = $this->getUser(); // ou $entityManager->getRepository(Station::class)->find($id);
        $form = $this->createForm(PisteType::class, $piste, [
            'station' => $station,
            'user' => $this->getUser(),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $registry->getManager();
            $entityManager->persist($piste);
            $entityManager->flush();

            return $this->redirectToRoute('account');
        }

        return $this->render('account/add_piste.html.twig', [
            'form' => $form->createView(),
        ]);
    }

        
    #[Route('/piste/delete/{id}', name: 'delete_piste"')]
    public function deletePiste(Request $request, EntityManagerInterface $em): Response
    {
        $piste = $em->getRepository(Piste::class)->find($request->get('id'));

        if (!$piste) {
            throw $this->createNotFoundException('Cette piste n\'existe pas.');
        }

        $em->remove($piste);
        $em->flush();

        $this->addFlash('success', 'La piste a bien été supprimé.');

        return $this->redirectToRoute('account');
    }

    #[Route('/telesiege/delete/{id}', name: 'delete_telesiege"')]
    public function deleteTelesiege(Request $request, EntityManagerInterface $em): Response
    {
        $piste = $em->getRepository(Piste::class)->find($request->get('id'));

        if (!$piste) {
            throw $this->createNotFoundException('Ce télésiege n\'existe pas.');
        }

        $em->remove($piste);
        $em->flush();

        $this->addFlash('success', 'Le télésiege a bien été supprimé.');

        return $this->redirectToRoute('account');
    }
}

