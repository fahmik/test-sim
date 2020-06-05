<?php

namespace App\Entity;

use App\Repository\ParamdecisionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParamdecisionRepository::class)
 */
class Paramdecision
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $parametre;

    /**
     * @ORM\Column(type="integer")
     */
    private $valeurinit;

    /**
     * @ORM\Column(type="integer")
     */
    private $augmtour;

    /**
     * @ORM\ManyToOne(targetEntity=Configjeux::class, inversedBy="paramdecisions")
     */
    private $idconfig;

    /**
     * @ORM\OneToMany(targetEntity=Decisiontour::class, mappedBy="idparam")
     */
    private $decisiontours;

    public function __construct()
    {
        $this->decisiontours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParametre(): ?string
    {
        return $this->parametre;
    }

    public function setParametre(string $parametre): self
    {
        $this->parametre = $parametre;

        return $this;
    }

    public function getValeurinit(): ?int
    {
        return $this->valeurinit;
    }

    public function setValeurinit(int $valeurinit): self
    {
        $this->valeurinit = $valeurinit;

        return $this;
    }

    public function getAugmtour(): ?int
    {
        return $this->augmtour;
    }

    public function setAugmtour(int $augmtour): self
    {
        $this->augmtour = $augmtour;

        return $this;
    }

    public function getIdconfig(): ?Configjeux
    {
        return $this->idconfig;
    }

    public function setIdconfig(?Configjeux $idconfig): self
    {
        $this->idconfig = $idconfig;

        return $this;
    }

    /**
     * @return Collection|Decisiontour[]
     */
    public function getDecisiontours(): Collection
    {
        return $this->decisiontours;
    }

    public function addDecisiontour(Decisiontour $decisiontour): self
    {
        if (!$this->decisiontours->contains($decisiontour)) {
            $this->decisiontours[] = $decisiontour;
            $decisiontour->setIdparam($this);
        }

        return $this;
    }

    public function removeDecisiontour(Decisiontour $decisiontour): self
    {
        if ($this->decisiontours->contains($decisiontour)) {
            $this->decisiontours->removeElement($decisiontour);
            // set the owning side to null (unless already changed)
            if ($decisiontour->getIdparam() === $this) {
                $decisiontour->setIdparam(null);
            }
        }

        return $this;
    }
}
