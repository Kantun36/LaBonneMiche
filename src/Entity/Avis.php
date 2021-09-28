<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AvisRepository::class)
 */
class Avis
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
    private $IdAvis;

    /**
     * @ORM\Column(type="integer")
     */
    private $NoteAvis;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Commentaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAvis(): ?int
    {
        return $this->IdAvis;
    }

    public function setIdAvis(int $IdAvis): self
    {
        $this->IdAvis = $IdAvis;

        return $this;
    }

    public function getNoteAvis(): ?int
    {
        return $this->NoteAvis;
    }

    public function setNoteAvis(int $NoteAvis): self
    {
        $this->NoteAvis = $NoteAvis;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->Commentaire;
    }

    public function setCommentaire(?string $Commentaire): self
    {
        $this->Commentaire = $Commentaire;

        return $this;
    }
}
