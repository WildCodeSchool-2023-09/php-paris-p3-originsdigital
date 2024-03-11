<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this-> passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        // Fixture d'un utilisateur connecté, seuls les champs obligatoires pour ce type de profil sont renseignés.
        //Mot de passe : '1234'//
        $user = new User();
        $user->setUsername('USER');
        $user->setEmail('user@test.com');
        $user->setPassword($this->passwordHasher->hashPassword($user, '1234'));
        $user->setRoles(['ROLE_USER']);
        $manager->persist($user);

        //Fixture d'un utilisateur Premium, seuls les champs obligatoires sont renseignés. Mot de passe : '1234'//
        $premium = new User();
        $premium->setUsername('PREMIUM');
        $premium->setEmail('premium@test.com');
        $premium->setpassword($this->passwordHasher->hashPassword($premium, '1234'));
        $premium->setRoles(['ROLE_PREMIUM']);
        $manager->persist($premium);

        //Fixture d'un admin, seuls les champs obligatoires sont renseignés. Mot de passe : '1234'//
        $admin = new User();
        $admin->setUsername('ADMIN');
        $admin->setEmail('admin@test.com');
        $admin->setPassword($this->passwordHasher->hashPassword($admin, '1234'));
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        $placeholder = new User();
        $placeholder->setUsername('MC Lambert');
        $placeholder->setEmail('micka@lambert.com');
        $placeholder->setpassword($this->passwordHasher->hashPassword($placeholder, 'zizi1234'));
        $placeholder->setRoles(['ROLE_USER']);
        $placeholder->setProfilepicture('micka.png');
        $manager->persist($placeholder);

        $manager->flush();
    }
}
