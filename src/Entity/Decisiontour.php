<?php

namespace App\Entity;

use App\Repository\DecisiontourRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DecisiontourRepository::class)
 */
class Decisiontour
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $valeur;

    /**
     * @ORM\Column(type="integer")
     */
    private $valhist;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $decision;

    /**
     * @ORM\ManyToOne(targetEntity=Tour::class, inversedBy="decisiontours")
     */
    private $idtour;

    /**
     * @ORM\ManyToOne(targetEntity=Paramdecision::class, inversedBy="decisiontours")
     */
    private $idparam;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeur(): ?int
    {
        return $this->valeur;
    }

    public function setValeur(int $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function getValhist(): ?int
    {
        return $this->valhist;
    }

    public function setValhist(int $valhist): self
    {
        $this->valhist = $valhist;

        return $this;
    }

    public function getDecision(): ?string
    {
        return $this->decision;
    }

    public function setDecision(?string $decision): self
    {
        $this->decision = $decision;

        return $this;
    }

    public function getIdtour(): ?Tour
    {
        return $this->idtour;
    }

    public function setIdtour(?Tour $idtour): self
    {
        $this->idtour = $idtour;

        return $this;
    }

    public function getIdparam(): ?Paramdecision
    {
        return $this->idparam;
    }

    public function setIdparam(?Paramdecision $idparam): self
    {
        $this->idparam = $idparam;

        return $this;
    }
}
