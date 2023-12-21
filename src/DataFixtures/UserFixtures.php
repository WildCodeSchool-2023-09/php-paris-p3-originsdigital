<?php

namespace App\DataFixtures;

use App\Entity\User;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        // Fixture d'un utilisateur connecté, seuls les champs obligatoires pour ce type de profil sont renseignés//
        $user = new User();
        $user->setUsername('USER');
        $user->setEmail('user@test.com');
        $user->setPassword('1234');
        $user->setRoles(['ROLE_USER']);
        $manager->persist($user);

        //Fixture d'un utilisateur premium, seuls les chammps obligatoires sont renseignés//
        $premium = new User();
        $premium->setUsername('PREMIUM');
        $premium->setEmail('premium@test.com');
        $premium->setpassword('1234');
        $premium->setRoles(['ROLE_PREMIUM']);
        $manager->persist($premium);

        //Fixture d'un admin, seuls les chammps obligatoires sont renseignés//
        $admin = new User();
        $admin->setUsername('ADMIN');
        $admin->setEmail('admin@test.com');
        $admin->setPassword('1234');
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);
        $manager->flush();
    }
}
