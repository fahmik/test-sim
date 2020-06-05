<?php

namespace App\Entity;

use App\Repository\TourRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TourRepository::class)
 */
class Tour
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
    private $numtour;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $libelle;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateheurefin;

    /**
     * @ORM\ManyToOne(targetEntity=Jeux::class, inversedBy="tours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idjeux;

    /**
     * @ORM\OneToMany(targetEntity=Decisiontour::class, mappedBy="idtour")
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

    public function getIdjeux(): ?int
    {
        return $this->idjeux;
    }

    public function setIdjeux(int $idjeux): self
    {
        $this->idjeux = $idjeux;

        return $this;
    }


    public function getNumtour(): ?int
    {
        return $this->numtour;
    }

    public function setNumtour(int $numtour): self
    {
        $this->numtour = $numtour;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDateheurefin(): ?\DateTimeInterface
    {
        return $this->dateheurefin;
    }

    public function setDateheurefin(\DateTimeInterface $dateheurefin): self
    {
        $this->dateheurefin = $dateheurefin;

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
            $decisiontour->setIdtour($this);
        }

        return $this;
    }

    public function removeDecisiontour(Decisiontour $decisiontour): self
    {
        if ($this->decisiontours->contains($decisiontour)) {
            $this->decisiontours->removeElement($decisiontour);
            // set the owning side to null (unless already changed)
            if ($decisiontour->getIdtour() === $this) {
                $decisiontour->setIdtour(null);
            }
        }

        return $this;
    }
}
