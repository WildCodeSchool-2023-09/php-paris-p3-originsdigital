<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'createdBy', targetEntity: Playlist::class)]
    private Collection $playlists;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
    private ?UserPlaylist $program = null;

    public function __construct()
    {
        $this->playlists = new ArrayCollection();
    }


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
     * @return Collection<int, Playlist>
     */
    public function getPlaylists(): Collection
    {
        return $this->playlists;
    }

    public function addPlaylist(Playlist $playlist): static
    {
        if (!$this->playlists->contains($playlist)) {
            $this->playlists->add($playlist);
            $playlist->setCreatedBy($this);
        }

        return $this;
    }

    public function removePlaylist(Playlist $playlist): static
    {
        if ($this->playlists->removeElement($playlist)) {
            // set the owning side to null (unless already changed)
            if ($playlist->getCreatedBy() === $this) {
                $playlist->setCreatedBy(null);
            }
        }

        return $this;
    }

    public function getProgram(): ?UserPlaylist
    {
        return $this->program;
    }

    public function setProgram(?UserPlaylist $program): static
    {
        // unset the owning side of the relation if necessary
        if ($program === null && $this->program !== null) {
            $this->program->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($program !== null && $program->getUser() !== $this) {
            $program->setUser($this);
        }

        $this->program = $program;

        return $this;
    }
}
