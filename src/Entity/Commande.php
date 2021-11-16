<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $IdCommande;

    /**
     * @ORM\Column(type="float")
     */
    private $PrixCommande;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Pret;

    /**
     * @ORM\ManyToMany(targetEntity=Produit::class, inversedBy="commandes")
     */
    private $Produits;

    public function __construct()
    {
        $this->Produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCommande(): ?int
    {
        return $this->IdCommande;
    }

    public function setIdCommande(int $IdCommande): self
    {
        $this->IdCommande = $IdCommande;

        return $this;
    }

    public function getPrixCommande(): ?float
    {
        return $this->PrixCommande;
    }

    public function setPrixCommande(float $PrixCommande): self
    {
        $this->PrixCommande = $PrixCommande;

        return $this;
    }

    public function getPret(): ?bool
    {
        return $this->Pret;
    }

    public function setPret(bool $Pret): self
    {
        $this->Pret = $Pret;

        return $this;
    }

    /**
     * @return Collection|Produit[]
     */
    public function getProduits(): Collection
    {
        return $this->Produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->Produits->contains($produit)) {
            $this->Produits[] = $produit;
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        $this->Produits->removeElement($produit);

        return $this;
    }
}
