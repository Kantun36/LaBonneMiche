<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     *
     */
    private $id;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $RaisonContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TextContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PrenomContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $MailContact;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNomContact(): ?string
    {
        return $this->NomContact;
    }

    public function setNomContact(string $NomContact): self
    {
        $this->NomContact = $NomContact;

        return $this;
    }

    public function getPrenomContact(): ?string
    {
        return $this->PrenomContact;
    }

    public function setPrenomContact(string $PrenomContact): self
    {
        $this->PrenomContact = $PrenomContact;

        return $this;
    }

    public function getMailContact(): ?string
    {
        return $this->MailContact;
    }

    public function setMailContact(string $MailContact): self
    {
        $this->MailContact = $MailContact;

        return $this;
    }
}
