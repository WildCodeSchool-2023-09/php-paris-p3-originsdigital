<?php

namespace App\Entity;

use App\Repository\PlaylistRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaylistRepository::class)]
class Playlist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\ManyToOne(inversedBy: 'playlists')]
    private ?User $createdBy = null;

    #[ORM\OneToOne(mappedBy: 'playlist', cascade: ['persist', 'remove'])]
    private ?UserPlaylist $userPlaylist = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): static
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getUserPlaylist(): ?UserPlaylist
    {
        return $this->userPlaylist;
    }

    public function setUserPlaylist(?UserPlaylist $userPlaylist): static
    {
        // unset the owning side of the relation if necessary
        if ($userPlaylist === null && $this->userPlaylist !== null) {
            $this->userPlaylist->setPlaylist(null);
        }

        // set the owning side of the relation if necessary
        if ($userPlaylist !== null && $userPlaylist->getPlaylist() !== $this) {
            $userPlaylist->setPlaylist($this);
        }

        $this->userPlaylist = $userPlaylist;

        return $this;
    }
}
