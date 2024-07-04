<?php

namespace App\Entity;

use App\Repository\VehiculesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehiculesRepository::class)
 */
class Vehicules
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
    private $matricule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $assurance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $controle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $circulation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $entretien;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $kilometrage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $relation;

    /**
     * @ORM\OneToOne(targetEntity=Chauffeurs::class, cascade={"persist", "remove"})
     */
    private $Chauffeurs;

    /**
     * @ORM\OneToMany(targetEntity=Livraisons::class, mappedBy="Vehicules")
     */
    private $livraisons;

    public function __construct()
    {
        $this->livraisons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getAssurance(): ?string
    {
        return $this->assurance;
    }

    public function setAssurance(string $assurance): self
    {
        $this->assurance = $assurance;

        return $this;
    }

    public function getControle(): ?string
    {
        return $this->controle;
    }

    public function setControle(string $controle): self
    {
        $this->controle = $controle;

        return $this;
    }

    public function getCirculation(): ?string
    {
        return $this->circulation;
    }

    public function setCirculation(string $circulation): self
    {
        $this->circulation = $circulation;

        return $this;
    }

    public function getEntretien(): ?string
    {
        return $this->entretien;
    }

    public function setEntretien(string $entretien): self
    {
        $this->entretien = $entretien;

        return $this;
    }

    public function getKilometrage(): ?string
    {
        return $this->kilometrage;
    }

    public function setKilometrage(string $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    public function setRelation(string $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    public function getChauffeurs(): ?Chauffeurs
    {
        return $this->Chauffeurs;
    }

    public function setChauffeurs(?Chauffeurs $Chauffeurs): self
    {
        $this->Chauffeurs = $Chauffeurs;

        return $this;
    }

    /**
     * @return Collection<int, Livraisons>
     */
    public function getLivraisons(): Collection
    {
        return $this->livraisons;
    }

    public function addLivraison(Livraisons $livraison): self
    {
        if (!$this->livraisons->contains($livraison)) {
            $this->livraisons[] = $livraison;
            $livraison->setVehicules($this);
        }

        return $this;
    }

    public function removeLivraison(Livraisons $livraison): self
    {
        if ($this->livraisons->removeElement($livraison)) {
            // set the owning side to null (unless already changed)
            if ($livraison->getVehicules() === $this) {
                $livraison->setVehicules(null);
            }
        }

        return $this;
    }
}
