<?php

namespace App\DataFixtures;

use App\Entity\Domaine;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DomaineFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $domaineData = [
            [
                'name' => 'Domaine 1',
                'description' => 'Description du domaine 1',
            ],
            [
                'name' => 'Domaine 2',
                'description' => 'Description du domaine 2',
            ],
        ];

        foreach ($domaineData as $data) {
            $domaine = new Domaine();
            $domaine->setName($data['name'])
                    ->setDescription($data['description']);

            $manager->persist($domaine);
        }

        $manager->flush();
    }
}
