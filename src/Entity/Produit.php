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
     * @ORM\Column(type="integer")
     */
    private $IdArticle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomArticle;

    /**
     * @ORM\Column(type="float")
     */
    private $PrixArticle;

    /**
     * @ORM\Column(type="float")
     */
    private $PoidsArticle;

    /**
     * @ORM\Column(type="integer")
     */
    private $Quantite;

    public function __toString(): string
   {
       return $this->id.' '.$this->nom_article;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdArticle(): ?int
    {
        return $this->IdArticle;
    }

    public function setIdArticle(int $IdArticle): self
    {
        $this->IdArticle = $IdArticle;

        return $this;
    }

    public function getNomArticle(): ?string
    {
        return $this->NomArticle;
    }

    public function setNomArticle(string $NomArticle): self
    {
        $this->NomArticle = $NomArticle;

        return $this;
    }

    public function getPrixArticle(): ?float
    {
        return $this->PrixArticle;
    }

    public function setPrixArticle(float $PrixArticle): self
    {
        $this->PrixArticle = $PrixArticle;

        return $this;
    }

    public function getPoidsArticle(): ?float
    {
        return $this->PoidsArticle;
    }

    public function setPoidsArticle(float $PoidsArticle): self
    {
        $this->PoidsArticle = $PoidsArticle;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->Quantite;
    }

    public function setQuantite(int $Quantite): self
    {
        $this->Quantite = $Quantite;

        return $this;
    }
}
