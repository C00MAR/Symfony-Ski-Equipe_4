<?php

namespace App\DataFixtures;

use App\Entity\Telesiege;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TelesiegeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $telesiegeData = [
            [
                'name' => 'Telesiege 1',
                'open_hour' => '08:00',
                'close_hour' => '17:00',
                'fermeture' => false,
                'fermeture_message' => '',
            ],
            [
                'name' => 'Telesiege 2',
                'open_hour' => '09:00',
                'close_hour' => '16:00',
                'fermeture' => true,
                'fermeture_message' => 'Fermé pour maintenance',
            ],
        ];

        foreach ($telesiegeData as $data) {
            $telesiege = new Telesiege();
            $telesiege->setName($data['name'])
                    ->setOpenHour(new \DateTime($data['open_hour']))
                    ->setCloseHour(new \DateTime($data['close_hour']))
                    ->setFermeture($data['fermeture'])
                    ->setFermetureMessage($data['fermeture_message']);

            $manager->persist($telesiege);
        }

        $manager->flush();
    }
}
