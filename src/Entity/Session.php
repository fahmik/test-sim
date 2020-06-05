<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SessionRepository::class)
 */
class Session
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbactions;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $valactions;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $nomste;

    /**
     * @ORM\ManyToOne(targetEntity=Joueur::class, inversedBy="sessions")
     */
    private $idjoueur;

    /**
     * @ORM\ManyToOne(targetEntity=Jeux::class, inversedBy="sessions")
     */
    private $idjeux;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbactions(): ?int
    {
        return $this->nbactions;
    }

    public function setNbactions(?int $nbactions): self
    {
        $this->nbactions = $nbactions;

        return $this;
    }

    public function getValactions(): ?int
    {
        return $this->valactions;
    }

    public function setValactions(?int $valactions): self
    {
        $this->valactions = $valactions;

        return $this;
    }

    public function getNomste(): ?string
    {
        return $this->nomste;
    }

    public function setNomste(?string $nomste): self
    {
        $this->nomste = $nomste;

        return $this;
    }

    public function getIdjoueur(): ?Joueur
    {
        return $this->idjoueur;
    }

    public function setIdjoueur(?Joueur $idjoueur): self
    {
        $this->idjoueur = $idjoueur;

        return $this;
    }

    public function getIdjeux(): ?Jeux
    {
        return $this->idjeux;
    }

    public function setIdjeux(?Jeux $idjeux): self
    {
        $this->idjeux = $idjeux;

        return $this;
    }
}
