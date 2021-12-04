<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
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
    private $Titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Contenu;

    /**
     * @ORM\OneToOne(targetEntity=Image::class, mappedBy="Articles", cascade={"persist", "remove"})
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=Paragraphe::class, mappedBy="article")
     */
    private $Paragraphes;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="Articles")
     */
    private $commentaires;

    public function __construct()
    {
        $this->Paragraphes = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->Contenu;
    }

    public function setContenu(string $Contenu): self
    {
        $this->Contenu = $Contenu;

        return $this;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(Image $image): self
    {
        // set the owning side of the relation if necessary
        if ($image->getArticles() !== $this) {
            $image->setArticles($this);
        }

        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Paragraphe[]
     */
    public function getParagraphes(): Collection
    {
        return $this->Paragraphes;
    }

    public function addParagraphe(Paragraphe $paragraphe): self
    {
        if (!$this->Paragraphes->contains($paragraphe)) {
            $this->Paragraphes[] = $paragraphe;
            $paragraphe->setArticle($this);
        }

        return $this;
    }

    public function removeParagraphe(Paragraphe $paragraphe): self
    {
        if ($this->Paragraphes->removeElement($paragraphe)) {
            // set the owning side to null (unless already changed)
            if ($paragraphe->getArticle() === $this) {
                $paragraphe->setArticle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setArticles($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getArticles() === $this) {
                $commentaire->setArticles(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getTitre();
    }

}
