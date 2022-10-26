<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 */
class Location
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_location;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $heure_location;

    /**
     * @ORM\ManyToOne(targetEntity=Velo::class, inversedBy="locations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $velos;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateLocation(): ?\DateTimeInterface
    {
        return $this->date_location;
    }

    public function setDateLocation(\DateTimeInterface $date_location): self
    {
        $this->date_location = $date_location;

        return $this;
    }

    public function getHeureLocation(): ?string
    {
        return $this->heure_location;
    }

    public function setHeureLocation(string $heure_location): self
    {
        $this->heure_location = $heure_location;

        return $this;
    }

    public function getVelos(): ?Velo
    {
        return $this->velos;
    }

    public function setVelos(?Velo $velos): self
    {
        $this->velos = $velos;

        return $this;
    }

    public function getUser(): ?User1
    {
        return $this->user;
    }

    public function setUser(?User1 $user): self
    {
        $this->user = $user;

        return $this;
    }
}
