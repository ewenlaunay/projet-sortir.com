<?php

namespace App\DataFixtures;

use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CityFixtures extends Fixture
{
    public const CITY_REFERENCE = 'city';

    public function load(ObjectManager $manager)
    {
        $city = new City();
        $city->setName('Chartes de bretagne');
        $city->setZipCode(35131);
        //$city->addLocation($this->getReference('location'));
        $manager->persist($city);
        $this->addReference(self::CITY_REFERENCE, $city);

        $city1 = new City();
        $city1->setName('Nantes');
        $city1->setZipCode(44000);
        //$city->addLocation($this->getReference('location'));
        $manager->persist($city1);

        $city2 = new City();
        $city2->setName('Chartes de bretagne');
        $city2->setZipCode(75000);
        //$city->addLocation($this->getReference('location'));
        $manager->persist($city2);

        $manager->flush();

    }
}