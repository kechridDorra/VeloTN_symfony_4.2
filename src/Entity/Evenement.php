<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EvenementRepository::class)
 */
class Evenement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_evenement;

    /**
     * @ORM\Column(type="date")
     */
    private $date_evenement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $heure_evenement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description_evenement;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="evenements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Participation::class, mappedBy="evenement", orphanRemoval=true)
     */
    private $participations;

    public function __construct()
    {
        $this->participations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEvenement(): ?string
    {
        return $this->nom_evenement;
    }

    public function setNomEvenement(string $nom_evenement): self
    {
        $this->nom_evenement = $nom_evenement;

        return $this;
    }

    public function getDateEvenement(): ?\DateTimeInterface
    {
        return $this->date_evenement;
    }

    public function setDateEvenement(\DateTimeInterface $date_evenement): self
    {
        $this->date_evenement = $date_evenement;

        return $this;
    }

    public function getHeureEvenement(): ?string
    {
        return $this->heure_evenement;
    }

    public function setHeureEvenement(string $heure_evenement): self
    {
        $this->heure_evenement = $heure_evenement;

        return $this;
    }

    public function getDescriptionEvenement(): ?string
    {
        return $this->description_evenement;
    }

    public function setDescriptionEvenement(string $description_evenement): self
    {
        $this->description_evenement = $description_evenement;

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

    /**
     * @return Collection|Participation[]
     */
    public function getParticipations(): Collection
    {
        return $this->participations;
    }

    public function addParticipation(Participation $participation): self
    {
        if (!$this->participations->contains($participation)) {
            $this->participations[] = $participation;
            $participation->setEvenement($this);
        }

        return $this;
    }

    public function removeParticipation(Participation $participation): self
    {
        if ($this->participations->removeElement($participation)) {
            // set the owning side to null (unless already changed)
            if ($participation->getEvenement() === $this) {
                $participation->setEvenement(null);
            }
        }

        return $this;
    }
}
