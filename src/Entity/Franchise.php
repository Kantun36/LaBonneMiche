<?php

namespace App\Entity;

use App\Repository\FranchiseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FranchiseRepository::class)
 */
class Franchise
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
    private $Sexe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomFranchise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PrenomFranchise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TelephoneFranchise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $AdresseFranchise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PostalFranchise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $VilleFranchise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PaysFranchise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TypeFranchise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PaysProjetFranchise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $RegionFranchise;

    /**
     * @ORM\Column(type="text")
     */
    private $InfoFranchise;

    /**
     * @ORM\Column(type="text")
     */
    private $RaisonFranchise;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSexe(): ?string
    {
        return $this->Sexe;
    }

    public function setSexe(string $Sexe): self
    {
        $this->Sexe = $Sexe;

        return $this;
    }

    public function getNomFranchise(): ?string
    {
        return $this->NomFranchise;
    }

    public function setNomFranchise(string $NomFranchise): self
    {
        $this->NomFranchise = $NomFranchise;

        return $this;
    }

    public function getPrenomFranchise(): ?string
    {
        return $this->PrenomFranchise;
    }

    public function setPrenomFranchise(string $PrenomFranchise): self
    {
        $this->PrenomFranchise = $PrenomFranchise;

        return $this;
    }

    public function getTelephoneFranchise(): ?string
    {
        return $this->TelephoneFranchise;
    }

    public function setTelephoneFranchise(string $TelephoneFranchise): self
    {
        $this->TelephoneFranchise = $TelephoneFranchise;

        return $this;
    }

    public function getAdresseFranchise(): ?string
    {
        return $this->AdresseFranchise;
    }

    public function setAdresseFranchise(string $AdresseFranchise): self
    {
        $this->AdresseFranchise = $AdresseFranchise;

        return $this;
    }

    public function getPostalFranchise(): ?string
    {
        return $this->PostalFranchise;
    }

    public function setPostalFranchise(string $PostalFranchise): self
    {
        $this->PostalFranchise = $PostalFranchise;

        return $this;
    }

    public function getVilleFranchise(): ?string
    {
        return $this->VilleFranchise;
    }

    public function setVilleFranchise(string $VilleFranchise): self
    {
        $this->VilleFranchise = $VilleFranchise;

        return $this;
    }

    public function getPaysFranchise(): ?string
    {
        return $this->PaysFranchise;
    }

    public function setPaysFranchise(string $PaysFranchise): self
    {
        $this->PaysFranchise = $PaysFranchise;

        return $this;
    }

    public function getTypeFranchise(): ?string
    {
        return $this->TypeFranchise;
    }

    public function setTypeFranchise(string $TypeFranchise): self
    {
        $this->TypeFranchise = $TypeFranchise;

        return $this;
    }

    public function getPaysProjetFranchise(): ?string
    {
        return $this->PaysProjetFranchise;
    }

    public function setPaysProjetFranchise(string $PaysProjetFranchise): self
    {
        $this->PaysProjetFranchise = $PaysProjetFranchise;

        return $this;
    }

    public function getRegionFranchise(): ?string
    {
        return $this->RegionFranchise;
    }

    public function setRegionFranchise(string $RegionFranchise): self
    {
        $this->RegionFranchise = $RegionFranchise;

        return $this;
    }

    public function getInfoFranchise(): ?string
    {
        return $this->InfoFranchise;
    }

    public function setInfoFranchise(string $InfoFranchise): self
    {
        $this->InfoFranchise = $InfoFranchise;

        return $this;
    }

    public function getRaisonFranchise(): ?string
    {
        return $this->RaisonFranchise;
    }

    public function setRaisonFranchise(string $RaisonFranchise): self
    {
        $this->RaisonFranchise = $RaisonFranchise;

        return $this;
    }
}
