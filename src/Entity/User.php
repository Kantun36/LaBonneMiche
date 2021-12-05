<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles ;

    public function __construct()
    {
        $this->roles = array('ROLE_USER');
        $this->PointsFidels=0;
        $this->commandes = new ArrayCollection();
    }

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomUser;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PrenomUser;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $NumTel;

    /**
     * @ORM\Column(type="integer")
     */
    private $PointsFidels;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="userCommande")
     */
    private $commandes;

    /**
     * @ORM\OneToOne(targetEntity=Adresse::class, mappedBy="userAdresse", cascade={"persist", "remove"})
     */
    private $adresse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNomUser(): ?string
    {
        return $this->NomUser;
    }

    public function setNomUser(string $NomUser): self
    {
        $this->NomUser = $NomUser;

        return $this;
    }

    public function getPrenomUser(): ?string
    {
        return $this->PrenomUser;
    }

    public function setPrenomUser(string $PrenomUser): self
    {
        $this->PrenomUser = $PrenomUser;

        return $this;
    }

    public function getNumTel(): ?int
    {
        return $this->NumTel;
    }

    public function setNumTel(?int $NumTel): self
    {
        $this->NumTel = $NumTel;

        return $this;
    }

    public function getPointsFidels(): ?int
    {
        return $this->PointsFidels;
    }

    public function setPointsFidels(int $PointsFidels): self
    {
        $this->PointsFidels = $PointsFidels;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setUserCommande($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getUserCommande() === $this) {
                $commande->setUserCommande(null);
            }
        }

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresse $adresse): self
    {
        // unset the owning side of the relation if necessary
        if ($adresse === null && $this->adresse !== null) {
            $this->adresse->setUserAdresse(null);
        }

        // set the owning side of the relation if necessary
        if ($adresse !== null && $adresse->getUserAdresse() !== $this) {
            $adresse->setUserAdresse($this);
        }

        $this->adresse = $adresse;

        return $this;
    }
}