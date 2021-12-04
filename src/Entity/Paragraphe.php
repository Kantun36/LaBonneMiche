<?php

namespace App\Entity;

use App\Repository\ParagrapheRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParagrapheRepository::class)
 */
class Paragraphe
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
    private $numeroParagraphe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titreParagraphe;

    /**
     * @ORM\Column(type="text")
     */
    private $contenuParagraphe;

    /**
     * @ORM\OneToOne(targetEntity=Image::class, mappedBy="Paragraphes", cascade={"persist", "remove"})
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="Paragraphes")
     */
    private $article;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroParagraphe(): ?int
    {
        return $this->numeroParagraphe;
    }

    public function setNumeroParagraphe(int $numeroParagraphe): self
    {
        $this->numeroParagraphe = $numeroParagraphe;

        return $this;
    }

    public function getTitreParagraphe(): ?string
    {
        return $this->titreParagraphe;
    }

    public function setTitreParagraphe(string $titreParagraphe): self
    {
        $this->titreParagraphe = $titreParagraphe;

        return $this;
    }

    public function getContenuParagraphe(): ?string
    {
        return $this->contenuParagraphe;
    }

    public function setContenuParagraphe(string $contenuParagraphe): self
    {
        $this->contenuParagraphe = $contenuParagraphe;

        return $this;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): self
    {
        // unset the owning side of the relation if necessary
        if ($image === null && $this->image !== null) {
            $this->image->setParagraphes(null);
        }

        // set the owning side of the relation if necessary
        if ($image !== null && $image->getParagraphes() !== $this) {
            $image->setParagraphes($this);
        }

        $this->image = $image;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function __toString()
    {
        return $this->titreParagraphe;
    }
}
