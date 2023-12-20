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
        $connected = new User();
        $connected->setUsername('connecté');
        $connected->setMail('connecte@test.com');
        $connected->setPassword('1234');
        $connected->setRole('connected');
        $manager->persist($connected);

        //Fixture d'un utilisateur premium, seuls les chammps obligatoires sont renseignés//
        $premium = new User();
        $premium->setUsername('premium');
        $premium->setLastname('nompremium');
        $premium->setFirstname('prenompremium');
        $premium->setBirthdate($faker->dateTime());
        $premium->setHousenumber($faker->numberBetween(1, 100));
        $premium->setStreetname($faker->streetName());
        $premium->setCity($faker->city());
        $premium->setZipcode(010101);
        $premium->setCountry($faker->country());
        $premium->setMail('premium@test.com');
        $premium->setPhonenumber('0101010101');
        $premium->setpassword('1234');
        $premium->setRole('premium');
        $manager->persist($premium);

        //Fixture d'un admin, seuls les chammps obligatoires sont renseignés//
        $admin = new User();
        $admin->setUsername('admin');
        $admin->setMail('admin@test.com');
        $admin->setPassword('1234');
        $admin->setRole('admin');
        $manager->persist($admin);
        $manager->flush();
    }
}
