<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager)
    {
        // créer 20 utilisateurs
        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->setEmail('email' . $i . '@example.com');
            $user->setRoles(['ROLE_USER']);

            $password = $this->hasher->hashPassword($user, 'password' . $i);
            $user->setPassword($password);

            $user->setPseudo('pseudo' . $i);
            $user->setPicture('picture' . $i . '.jpg');
            $user->setBio('Bio de l\'utilisateur ' . $i);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
