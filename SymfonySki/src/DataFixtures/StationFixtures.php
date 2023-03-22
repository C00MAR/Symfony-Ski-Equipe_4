<?php

namespace App\DataFixtures;

use App\Entity\Station;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $stationData = [
            [
                'name' => 'Station 1',
                'password' => 'station1password',
                'roles' => ['ROLE_STATION'],
            ],
            [
                'name' => 'Station 2',
                'password' => 'station2password',
                'roles' => ['ROLE_STATION'],
            ],
        ];

        foreach ($stationData as $data) {
            $station = new Station();
            $station->setName($data['name'])
                    ->setRoles($data['roles'])
                    ->setPassword($data['password']);

            $manager->persist($station);
        }

        $manager->flush();
    }
}