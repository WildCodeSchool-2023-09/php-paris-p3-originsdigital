<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Fixture d'un utilisateur connecté, seuls les champs obligatoires pour ce type de profil sont renseignés.
        //Mot de passe : '1234'//
        $user = new User();
        $user->setUsername('USER');
        $user->setEmail('user@test.com');
        $user->setPassword('$2y$13$tUkFUXy5bz8e.bhLkBhE0.pf/QUvEIDAPkyOWCwJAXhmIkF93bJLK');
        $user->setRoles(['ROLE_USER']);
        $manager->persist($user);

        //Fixture d'un premium, seuls les chammps obligatoires sont renseignés. Mot de passe : '1234'//
        $premium = new User();
        $premium->setUsername('PREMIUM');
        $premium->setEmail('premium@test.com');
        $premium->setpassword('$2y$13$tUkFUXy5bz8e.bhLkBhE0.pf/QUvEIDAPkyOWCwJAXhmIkF93bJLK');
        $premium->setRoles(['ROLE_PREMIUM']);
        $manager->persist($premium);

        //Fixture d'un admin, seuls les chammps obligatoires sont renseignés. Mot de passe : '1234'//
        $admin = new User();
        $admin->setUsername('ADMIN');
        $admin->setEmail('admin@test.com');
        $admin->setPassword('$2y$13$tUkFUXy5bz8e.bhLkBhE0.pf/QUvEIDAPkyOWCwJAXhmIkF93bJLK');
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);
        $manager->flush();
    }
}
