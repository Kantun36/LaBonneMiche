<?php

namespace App\Entity;

use App\Repository\ComposantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ComposantRepository::class)
 */
class Composant
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
    private $IdComposant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomComposant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdComposant(): ?int
    {
        return $this->IdComposant;
    }

    public function setIdComposant(int $IdComposant): self
    {
        $this->IdComposant = $IdComposant;

        return $this;
    }

    public function getNomComposant(): ?string
    {
        return $this->NomComposant;
    }

    public function setNomComposant(string $NomComposant): self
    {
        $this->NomComposant = $NomComposant;

        return $this;
    }
}
