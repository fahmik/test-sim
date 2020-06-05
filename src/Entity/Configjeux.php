<?php

namespace App\Entity;

use App\Repository\ConfigjeuxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConfigjeuxRepository::class)
 */
class Configjeux
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=100)
     */
    private $critere;

    /**
     * @ORM\Column(type="integer")
     */
    private $niveau;

    /**
     * @ORM\Column(type="integer")
     */
    private $idparent;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $pourcentage;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $formule;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $coeftour;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $coefhistour;

    /**
     * @ORM\Column(type="boolean")
     */
    private $actif;

    /**
     * @ORM\ManyToOne(targetEntity=Jeux::class, inversedBy="configjeuxes")
     */
    private $idjeux;

    /**
     * @ORM\OneToMany(targetEntity=Paramdecision::class, mappedBy="idconfig")
     */
    private $paramdecisions;

    public function __construct()
    {
        $this->paramdecisions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdjeux(): ?int
    {
        return $this->idjeux;
    }

    public function setIdjeux(int $idjeux): self
    {
        $this->idjeux = $idjeux;

        return $this;
    }

    public function getCritere(): ?string
    {
        return $this->critere;
    }

    public function setCritere(string $critere): self
    {
        $this->critere = $critere;

        return $this;
    }

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getIdparent(): ?int
    {
        return $this->idparent;
    }

    public function setIdparent(int $idparent): self
    {
        $this->idparent = $idparent;

        return $this;
    }

    public function getPourcentage(): ?string
    {
        return $this->pourcentage;
    }

    public function setPourcentage(?string $pourcentage): self
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }

    public function getFormule(): ?string
    {
        return $this->formule;
    }

    public function setFormule(?string $formule): self
    {
        $this->formule = $formule;

        return $this;
    }

    public function getCoeftour(): ?int
    {
        return $this->coeftour;
    }

    public function setCoeftour(?int $coeftour): self
    {
        $this->coeftour = $coeftour;

        return $this;
    }

    public function getCoefhistour(): ?int
    {
        return $this->coefhistour;
    }

    public function setCoefhistour(?int $coefhistour): self
    {
        $this->coefhistour = $coefhistour;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * @return Collection|Paramdecision[]
     */
    public function getParamdecisions(): Collection
    {
        return $this->paramdecisions;
    }

    public function addParamdecision(Paramdecision $paramdecision): self
    {
        if (!$this->paramdecisions->contains($paramdecision)) {
            $this->paramdecisions[] = $paramdecision;
            $paramdecision->setIdconfig($this);
        }

        return $this;
    }

    public function removeParamdecision(Paramdecision $paramdecision): self
    {
        if ($this->paramdecisions->contains($paramdecision)) {
            $this->paramdecisions->removeElement($paramdecision);
            // set the owning side to null (unless already changed)
            if ($paramdecision->getIdconfig() === $this) {
                $paramdecision->setIdconfig(null);
            }
        }

        return $this;
    }
}
