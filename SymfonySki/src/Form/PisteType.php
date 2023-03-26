<?php
namespace App\Form;

use App\Entity\Telesiege;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Entity\Station;
use Symfony\Component\Security\Core\Security;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Piste;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PisteType extends AbstractType
{

    private Security $security;
    private EntityManagerInterface $entityManager;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
{

    $builder
        ->add('name', TextType::class, [
            'label' => 'Nom de la Piste'
        ])
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
        ]);
}

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Piste::class,
            'user' => null,
            'station' => null,
        ]);
    }

    
}
