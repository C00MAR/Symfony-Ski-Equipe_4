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

class TelesiegeType extends AbstractType
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
            'label' => 'Nom du télésiège'
        ])
        ->add('openHour', DateTimeType::class, [
            'label' => 'Heure d\'ouverture'
        ])
        ->add('closeHour', DateTimeType::class, [
            'label' => 'Heure de fermeture'
        ])
        ->add('fermeture', CheckboxType::class, [
            'label' => 'Fermeture',
            'data' => false
        ])
        ->add('fermetureMessage', TextareaType::class, [
            'label' => 'Message de fermeture'
        ]);
}

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Telesiege::class,
            'user' => null,
            'station' => null,
        ]);
    }

    
}
