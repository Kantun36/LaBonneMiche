<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentaireRepository::class)
 */
class Commentaire
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
    private $noteCommentaire;

    /**
     * @ORM\Column(type="text")
     */
    private $contenuCommentaire;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="commentaires")
     */
    private $Articles;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNoteCommentaire(): ?int
    {
        return $this->noteCommentaire;
    }

    public function setNoteCommentaire(int $noteCommentaire): self
    {
        $this->noteCommentaire = $noteCommentaire;

        return $this;
    }

    public function getContenuCommentaire(): ?string
    {
        return $this->contenuCommentaire;
    }

    public function setContenuCommentaire(string $contenuCommentaire): self
    {
        $this->contenuCommentaire = $contenuCommentaire;

        return $this;
    }

    public function getArticles(): ?Article
    {
        return $this->Articles;
    }

    public function setArticles(?Article $Articles): self
    {
        $this->Articles = $Articles;

        return $this;
    }
}
