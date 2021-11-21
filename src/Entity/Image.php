<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
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
    private $pathImage;

    /**
     * @ORM\OneToOne(targetEntity=Produit::class, inversedBy="image", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Produits;

    /**
     * @ORM\OneToOne(targetEntity=Article::class, inversedBy="image", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Articles;

    /**
     * @ORM\OneToOne(targetEntity=Paragraphe::class, inversedBy="image", cascade={"persist", "remove"})
     */
    private $Paragraphes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomImage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPathImage(): ?string
    {
        return $this->pathImage;
    }

    public function setPathImage(string $pathImage): self
    {
        $this->pathImage = $pathImage;

        return $this;
    }

    public function getProduits(): ?Produit
    {
        return $this->Produits;
    }

    public function setProduits(Produit $Produits): self
    {
        $this->Produits = $Produits;

        return $this;
    }

    public function getArticles(): ?Article
    {
        return $this->Articles;
    }

    public function setArticles(Article $Articles): self
    {
        $this->Articles = $Articles;

        return $this;
    }

    public function getParagraphes(): ?Paragraphe
    {
        return $this->Paragraphes;
    }

    public function setParagraphes(?Paragraphe $Paragraphes): self
    {
        $this->Paragraphes = $Paragraphes;

        return $this;
    }

    public function getNomImage(): ?string
    {
        return $this->NomImage;
    }

    public function setNomImage(string $NomImage): self
    {
        $this->NomImage = $NomImage;

        return $this;
    }
}
