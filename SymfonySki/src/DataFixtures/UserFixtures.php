<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $userData = [
            [
                'prenom' => 'John',
                'nom' => 'Doe',
                'mail' => 'john.doe@example.com',
                'password' => 'password1',
            ],
            [
                'prenom' => 'Jane',
                'nom' => 'Doe',
                'mail' => 'jane.doe@example.com',
                'password' => 'password2',
            ],
        ];

        foreach ($userData as $data) {
            $user = new User();
            $user->setPrenom($data['prenom'])
                 ->setNom($data['nom'])
                 ->setMail($data['mail'])
                 ->setPassword($data['password']);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
