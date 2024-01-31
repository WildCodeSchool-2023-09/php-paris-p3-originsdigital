<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Security\Core\User\EquatableInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(
    fields: ['email'],
    message: 'ce mail est déjà utilisé',
)]
#[UniqueEntity(
    fields: ['username'],
    message: 'ce pseudo est déjà utilisé',
)]
#[Vich\Uploadable]
class User implements UserInterface, PasswordAuthenticatedUserInterface, EquatableInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Assert\NotBlank(message: 'un pseudo est obligatoire')]
    #[Assert\Length(
        max: 180,
        maxMessage: 'Le pseudo saisi {{ value }} est trop long, il ne peut pas dépasser {{ limit }} caractères',
    )]
    private ?string $username = null;

    #[ORM\Column]
    private array $roles = ['ROLE_USER', 'ROLE_PREMIUM', 'ROLE_ADMIN'];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 150, unique: true)]
    #[Assert\Email(
        message: 'L\'email {{ value }} n\'est pas valide.',
    )]
    #[Assert\NotBlank(message: 'un mail est obligatoire')]
    #[Assert\Length(
        max: 150,
        maxMessage: 'Le mail saisi {{ value }} est trop long, il ne peut pas dépasser {{ limit }} caractères',
    )]
    private ?string $email = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $profilepicture = null;

    #[Vich\UploadableField(mapping: 'profilepicture_file', fileNameProperty: 'profilepicture')]
    #[Assert\File(
        maxSize: '2M',
        mimeTypes: ['image/jpeg', 'image/png', 'image/webp', 'image/tiff',],
    )]
    private ?File $profilepictureFile = null;

    #[ORM\ManyToMany(targetEntity: Course::class, mappedBy: 'user')]
    private Collection $courses;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
    }
    #[ORM\Column(length: 150, nullable: true)]
    private ?string $lastname = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $firstname = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $birthdate = null;

    #[ORM\Column(nullable: true)]
    private ?int $houseNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $streetName = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $country = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $phoneNumber = null;

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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        $this->password = null;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function setProfilepictureFile(File $image = null): User
    {
        $this->profilepictureFile = $image;
        return $this;
    }

    public function getProfilepictureFile(): ?File
    {
        return $this->profilepictureFile;
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

    public function isEqualTo(UserInterface $user): bool
    {
        if ($this->username !== $user->getUserIdentifier()) {
            return false;
        }
        return true;
    }

    /**
     * @return Collection<int, Course>
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Course $course): void
    {
        if (!$this->courses->contains($course)) {
            $this->courses->add($course);
            $course->addUser($this);
        }
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

    public function removeCourse(Course $course): void
    {
        if ($this->courses->removeElement($course)) {
            $course->removeUser($this);
        }
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

    public function getBirthdate(): ?\DateTimeImmutable
    {
        return $this->birthdate;
    }

    public function setBirthdate(?\DateTimeImmutable $birthdate): static
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getHouseNumber(): ?int
    {
        return $this->houseNumber;
    }

    public function setHouseNumber(?int $houseNumber): static
    {
        $this->houseNumber = $houseNumber;

        return $this;
    }

    public function getStreetName(): ?string
    {
        return $this->streetName;
    }

    public function setStreetName(?string $streetName): static
    {
        $this->streetName = $streetName;

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

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }
}
