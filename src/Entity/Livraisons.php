<?php

namespace App\Entity;

use App\Repository\LivraisonsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LivraisonsRepository::class)
 */
class Livraisons
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
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $depart;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $destination;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $colis;

    /**
     * @ORM\ManyToOne(targetEntity=Vehicules::class, inversedBy="livraisons")
     */
    private $Vehicules;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDepart(): ?string
    {
        return $this->depart;
    }

    public function setDepart(string $depart): self
    {
        $this->depart = $depart;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function getColis(): ?string
    {
        return $this->colis;
    }

    public function setColis(string $colis): self
    {
        $this->colis = $colis;

        return $this;
    }

    public function getVehicules(): ?Vehicules
    {
        return $this->Vehicules;
    }

    public function setVehicules(?Vehicules $Vehicules): self
    {
        $this->Vehicules = $Vehicules;

        return $this;
    }
}
