<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
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
}
