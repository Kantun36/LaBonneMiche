<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
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
    private $IdContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $RaisonContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TextContact;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdContact(): ?int
    {
        return $this->IdContact;
    }

    public function setIdContact(int $IdContact): self
    {
        $this->IdContact = $IdContact;

        return $this;
    }

    public function getRaisonContact(): ?string
    {
        return $this->RaisonContact;
    }

    public function setRaisonContact(string $RaisonContact): self
    {
        $this->RaisonContact = $RaisonContact;

        return $this;
    }

    public function getTextContact(): ?string
    {
        return $this->TextContact;
    }

    public function setTextContact(string $TextContact): self
    {
        $this->TextContact = $TextContact;

        return $this;
    }
}
