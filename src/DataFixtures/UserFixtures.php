<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public const USER_REFERENCE = 'user';

    private UserPasswordHasherInterface $hasher;

    /**
     * @param UserPasswordHasherInterface $hasher
     */
    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }


    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setName('Boulot');
        $user->setFirstName('Romain');
        $user->setEmail('a@a.com');
        $password = $this->hasher->hashPassword($user, '1234');
        $user->setPassword($password);
        $user->setPhoneNumber('0409087867');
        $user->setRoles((array)'ROLE_ADMIN');
        $user->setActive(true);
        $user->setSchool($this->getReference(SchoolFixtures::SCHOOL_REFERENCE));
        $manager->persist($user);

        $this->addReference(self::USER_REFERENCE, $user);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            SchoolFixtures::class,
        ];
    }
}