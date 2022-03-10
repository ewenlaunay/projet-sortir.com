<?php

namespace App\DataFixtures;

use App\Entity\Status;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StatusFixtures extends Fixture
{
    public const STATUS_REFERENCE = 'status';

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $status = new Status();
        $status->setLabel('Créée');
        $manager->persist($status);

        $status1 = new Status();
        $status1->setLabel('Ouverte');
        $manager->persist($status1);

        $status2 = new Status();
        $status2->setLabel('Clôturée');
        $manager->persist($status2);

        $this->addReference(self::STATUS_REFERENCE, $status);


        $manager->flush();
    }
}