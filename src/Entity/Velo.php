<?php

namespace App\Entity;

use App\Repository\VeloRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VeloRepository::class)
 */
class Velo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Description_velo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $marque_velo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prix_loc_velo;

    /**
     * @ORM\OneToMany(targetEntity=Location::class, mappedBy="velos", orphanRemoval=true)
     */
    private $locations;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
        $this->locations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescriptionVelo(): ?string
    {
        return $this->Description_velo;
    }

    public function setDescriptionVelo(?string $Description_velo): self
    {
        $this->Description_velo = $Description_velo;

        return $this;
    }

    public function getMarqueVelo(): ?string
    {
        return $this->marque_velo;
    }

    public function setMarqueVelo(?string $marque_velo): self
    {
        $this->marque_velo = $marque_velo;

        return $this;
    }

    public function getPrixLocVelo(): ?string
    {
        return $this->prix_loc_velo;
    }

    public function setPrixLocVelo(string $prix_loc_velo): self
    {
        $this->prix_loc_velo = $prix_loc_velo;

        return $this;
    }

    /**
     * @return Collection|Location[]
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }

    public function addLocation(Location $location): self
    {
        if (!$this->locations->contains($location)) {
            $this->locations[] = $location;
            $location->setVelos($this);
        }

        return $this;
    }

    public function removeLocation(Location $location): self
    {
        if ($this->locations->removeElement($location)) {
            // set the owning side to null (unless already changed)
            if ($location->getVelos() === $this) {
                $location->setVelos(null);
            }
        }

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
