<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    private $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1
            ->setUsername('admin')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->hasher->hashPassword($user1, 'admin'));

        $user2 = new User();
        $user2
            ->setUsername('user')
            ->setRoles(['ROLE_USER'])
            ->setPassword($this->hasher->hashPassword($user2, 'user'));

        $manager->persist($user1);
        $manager->persist($user2);

        $manager->flush();
    }
}
