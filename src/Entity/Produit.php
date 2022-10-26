<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
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
    private $nom_produit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description_produit;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prix_produit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $marque_produit;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image_produit;
    
	
	
	public function getId(): ?int
                  	{
                  		return $this->id;
                  	}
    public function getNomProduit(): ?string
    {
        return $this->nom_produit;
    }

    public function setNomProduit(string $nom_produit): self
    {
        $this->nom_produit = $nom_produit;

        return $this;
    }

    public function getDescriptionProduit(): ?string
    {
        return $this->description_produit;
    }

    public function setDescriptionProduit(?string $description_produit): self
    {
        $this->description_produit = $description_produit;

        return $this;
    }

    public function getPrixProduit(): ?string
    {
        return $this->prix_produit;
    }

    public function setPrixProduit(string $prix_produit): self
    {
        $this->prix_produit = $prix_produit;

        return $this;
    }

    public function getMarqueProduit(): ?string
    {
        return $this->marque_produit;
    }

    public function setMarqueProduit(?string $marque_produit): self
    {
        $this->marque_produit = $marque_produit;

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

    public function getImageProduit()
    {
        return $this->image_produit;
    }

    public function setImageProduit( $image_produit)
    {
        $this->image_produit = $image_produit;
        return $this;
    }



   
}
