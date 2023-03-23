<?php

namespace App\DataFixtures;

use App\Entity\Piste;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PisteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $pisteData = [
            [
                'name' => 'Piste verte',
                'open_hour' => new \DateTime('08:00:00'),
                'close_hour' => new \DateTime('17:00:00'),
                'fermeture' => false,
                'fermeture_message' => '',
                'difficulty' => 'Facile',
            ],
            [
                'name' => 'Piste bleue',
                'open_hour' => new \DateTime('08:00:00'),
                'close_hour' => new \DateTime('17:00:00'),
                'fermeture' => false,
                'fermeture_message' => '',
                'difficulty' => 'Intermédiaire',
            ],
            [
                'name' => 'Piste rouge',
                'open_hour' => new \DateTime('08:00:00'),
                'close_hour' => new \DateTime('17:00:00'),
                'fermeture' => false,
                'fermeture_message' => '',
                'difficulty' => 'Difficile',
            ],
            [
                'name' => 'Piste noire',
                'open_hour' => new \DateTime('08:00:00'),
                'close_hour' => new \DateTime('17:00:00'),
                'fermeture' => false,
                'fermeture_message' => '',
                'difficulty' => 'Très difficile',
            ],
        ];

        foreach ($pisteData as $data) {
            $piste = new Piste();
            $piste->setName($data['name'])
                ->setOpenHour($data['open_hour'])
                ->setCloseHour($data['close_hour'])
                ->setFermeture($data['fermeture'])
                ->setFermetureMessage($data['fermeture_message'])
                ->setDifficulty($data['difficulty']);
            $manager->persist($piste);
        }

        $manager->flush();
    }
}
