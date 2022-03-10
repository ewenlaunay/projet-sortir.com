<?php

namespace App\DataFixtures;

use App\Entity\Location;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LocationFixtures extends Fixture implements DependentFixtureInterface
{
    //public const LOCATION_REFERENCE = 'location';

    public function load(ObjectManager $manager)
    {
        $location = new Location();
        $location->setName('Ecole de Chartres de bretagne');
        $location->setStreet('rue du rond point');
        $location->setLatitude(48.042);
        $location->setLongitude(1.489012);
        $location->setCity($this->getReference(CityFixtures::CITY_REFERENCE));
        $manager->persist($location);

        $this->addReference('location', $location);

        $location1 = new Location();
        $location1->setName('Ecole de Nantes');
        $location1->setStreet('rue du rond point');
        $location1->setLatitude(48.042);
        $location1->setLongitude(1.489012);
        $location1->setCity($this->getReference(CityFixtures::CITY_REFERENCE));
        $manager->persist($location1);

        $location2 = new Location();
        $location2->setName('Ecole de Paris');
        $location2->setStreet('rue du rond point');
        $location2->setLatitude(48.042);
        $location2->setLongitude(1.489012);
        $location2->setCity($this->getReference(CityFixtures::CITY_REFERENCE));
        $manager->persist($location2);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CityFixtures::class,
        ];
    }
}