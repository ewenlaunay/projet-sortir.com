<?php

namespace App\DataFixtures;

use App\Entity\School;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SchoolFixtures extends Fixture
{
    public const SCHOOL_REFERENCE = 'school';


    public function load(ObjectManager $manager)
    {
        $school = new School();
        $school->setName('Chartres de bretagne');
        $manager->persist($school);

        $this->addReference(self::SCHOOL_REFERENCE, $school);

        $school1 = new School();
        $school1->setName('Nantes');
        $manager->persist($school1);

        $school2 = new School();
        $school2->setName('Paris');
        $manager->persist($school2);

        $manager->flush();

    }
}