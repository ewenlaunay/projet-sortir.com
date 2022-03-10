<?php

namespace App\DataFixtures;

use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EventFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $users = $this->getReference(UserFixtures::USER_REFERENCE);

        $event = new Event;
        $event->setName('Event 1');
        $event->setDateTimeStart(new \DateTime('06/04/2014'));
        $event->setDuration(new \DateTime('now'));
        $event->setRegistrationDeadline(new \DateTime('06/03/2014'));
        $event->setMaxRegistration(30);
        $event->setInfos('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry');
        $event->setOrganisedBy($this->getReference(UserFixtures::USER_REFERENCE));
        $event->setStatus($this->getReference(StatusFixtures::STATUS_REFERENCE));
        $event->setSchool($this->getReference(SchoolFixtures::SCHOOL_REFERENCE));
        if ($event->getName() === $users) {
            $event->addRegistratedUser($this->getReference(UserFixtures::USER_REFERENCE));
        }
        $manager->persist($event);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
            SchoolFixtures::class,
            LocationFixtures::class,
            StatusFixtures::class
        ];
    }
}