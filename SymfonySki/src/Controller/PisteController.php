<?php

namespace App\Controller;

use App\Entity\Piste;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PisteController extends AbstractController
{
    #[Route('/piste', name: 'app_piste')]
    public function ajouterPiste(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Créer une nouvelle instance de l'entité Piste
        $piste = new Piste();

        // Créer un formulaire pour saisir les détails de la piste
        $form = $this->createFormBuilder($piste)
            ->add('name', TextType::class)
            ->add('difficulty', ChoiceType::class, [
                'choices' => [
                    'Facile' => 'Facile',
                    'Moyen' => 'Moyen',
                    'Difficile' => 'Difficile',
                    'Expert' => 'Expert',
                ],
            ])
            ->add('open_hour', TimeType::class)
            ->add('close_hour', TimeType::class)
            ->add('fermeture', ChoiceType::class, [
                'choices' => [
                    'Oui' => 1 ,
                    'Non' => 0 ,
                ],
            ])
            ->add('fermeture_message', TextareaType::class, [
                'label' => 'Message de fermeture',
            ])
            ->add('enregistrer', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Enregistrer la piste dans la base de données
            $entityManager->persist($piste);
            $entityManager->flush();

            // Rediriger l'utilisateur vers une autre page
            //return $this->redirectToRoute('liste_des_pistes');
        }

        // Afficher le formulaire pour ajouter une nouvelle piste
        return $this->render('piste/piste.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
