<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(
    fields: ['mail'],
    message: 'ce mail est déjà utilisé',
)]
#[UniqueEntity(
    fields: ['username'],
    message: 'ce pseudo est déjà utilisé',
)]
#[UniqueEntity(
    fields: ['phonenumber'],
    message: 'ce numéro de téléphone est déjà utilisé',
)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    #[Assert\NotBlank(message: 'un pseudo est obligatoire')]
    #[Assert\Length(
        max: 150,
        maxMessage: 'Le pseudo saisi {{ value }} est trop long, il ne peut pas dépasser {{ limit }} caractères',
    )]
    private ?string $username = null;

    #[ORM\Column(length: 150, nullable: true)]
    #[Assert\Regex(
        pattern: '/\d/',
        match: false,
        message: 'Votre nom ne devrait pas contenir de numéros',
    )]
    private ?string $lastname = null;

    #[ORM\Column(length: 150, nullable: true)]
    #[Assert\Regex(
        pattern: '/\d/',
        match: false,
        message: 'Votre nom ne devrait pas contenir de numéros',
    )]
    private ?string $firstname = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $birthdate = null;

    #[ORM\Column(nullable: true)]
    private ?int $housenumber = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $streetname = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(nullable: true)]
    #[Assert\Regex(
        pattern: '/\d+/',
        match: false,
        message: 'Code postal invalide',
    )]
    private ?int $zipcode = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Assert\Regex(
        pattern: '/\d/',
        match: false,
        message: 'Votre pays devrait pas contenir de numéros',
    )]
    private ?string $country = null;

    #[ORM\Column(length: 150)]
    #[Assert\Email(
        message: 'L\'email {{ value }} n\'est pas valide.',
    )]
    #[Assert\NotBlank(message: 'un mail est obligatoire')]
    #[Assert\Length(
        max: 150,
        maxMessage: 'Le mail saisi {{ value }} est trop long, il ne peut pas dépasser {{ limit }} caractères',
    )]
    private ?string $mail = null;

    #[ORM\Column(length: 14, nullable: true)]
    #[Assert\Regex(
        pattern:
        '^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$',
        match: false,
        message: 'Numéro de téléphone invalide',
    )]
    private ?string $phonenumber = null;

    #[ORM\Column(length: 32)]
    #[Assert\NotBlank(message: 'un mot de passe est obligatoire')]
    #[Assert\Length(
        max: 32,
        maxMessage: 'Le mot de passe saisi {{ value }} est trop long, il ne peut pas dépasser {{ limit }} caractères',
    )]
    private ?string $password = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $profilepicture = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $role = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $quizzresult = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(?\DateTimeInterface $birthdate): static
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getHousenumber(): ?int
    {
        return $this->housenumber;
    }

    public function setHousenumber(?int $housenumber): static
    {
        $this->housenumber = $housenumber;

        return $this;
    }

    public function getStreetname(): ?string
    {
        return $this->streetname;
    }

    public function setStreetname(?string $streetname): static
    {
        $this->streetname = $streetname;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipcode(?int $zipcode): static
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPhonenumber(): ?string
    {
        return $this->phonenumber;
    }

    public function setPhonenumber(?string $phonenumber): static
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getProfilepicture(): ?string
    {
        return $this->profilepicture;
    }

    public function setProfilepicture(?string $profilepicture): static
    {
        $this->profilepicture = $profilepicture;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getQuizzresult(): ?string
    {
        return $this->quizzresult;
    }

    public function setQuizzresult(?string $quizzresult): static
    {
        $this->quizzresult = $quizzresult;

        return $this;
    }
}
