<?php

namespace App\Entity;

use App\Repository\JeuxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JeuxRepository::class)
 */
class Jeux
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
    private $libelle;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbretours;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $produit;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Tour::class, mappedBy="idjeux")
     */
    private $tours;

    /**
     * @ORM\OneToMany(targetEntity=Configjeux::class, mappedBy="idjeux")
     */
    private $configjeuxes;

    /**
     * @ORM\OneToMany(targetEntity=Session::class, mappedBy="idjeux")
     */
    private $sessions;

    public function __construct()
    {
        $this->tours = new ArrayCollection();
        $this->configjeuxes = new ArrayCollection();
        $this->sessions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNbretours(): ?int
    {
        return $this->nbretours;
    }

    public function setNbretours(int $nbretours): self
    {
        $this->nbretours = $nbretours;

        return $this;
    }

    public function getProduit(): ?string
    {
        return $this->produit;
    }

    public function setProduit(string $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Tour[]
     */
    public function getTours(): Collection
    {
        return $this->tours;
    }

    public function addTour(Tour $tour): self
    {
        if (!$this->tours->contains($tour)) {
            $this->tours[] = $tour;
            $tour->setIdjeux($this);
        }

        return $this;
    }

    public function removeTour(Tour $tour): self
    {
        if ($this->tours->contains($tour)) {
            $this->tours->removeElement($tour);
            // set the owning side to null (unless already changed)
            if ($tour->getIdjeux() === $this) {
                $tour->setIdjeux(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Configjeux[]
     */
    public function getConfigjeuxes(): Collection
    {
        return $this->configjeuxes;
    }

    public function addConfigjeux(Configjeux $configjeux): self
    {
        if (!$this->configjeuxes->contains($configjeux)) {
            $this->configjeuxes[] = $configjeux;
            $configjeux->setIdjeux($this);
        }

        return $this;
    }

    public function removeConfigjeux(Configjeux $configjeux): self
    {
        if ($this->configjeuxes->contains($configjeux)) {
            $this->configjeuxes->removeElement($configjeux);
            // set the owning side to null (unless already changed)
            if ($configjeux->getIdjeux() === $this) {
                $configjeux->setIdjeux(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Session[]
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function addSession(Session $session): self
    {
        if (!$this->sessions->contains($session)) {
            $this->sessions[] = $session;
            $session->setIdjeux($this);
        }

        return $this;
    }
    /*  public function __toString()
    {
        return $this->libelle;
    }*/

    public function removeSession(Session $session): self
    {
        if ($this->sessions->contains($session)) {
            $this->sessions->removeElement($session);
            // set the owning side to null (unless already changed)
            if ($session->getIdjeux() === $this) {
                $session->setIdjeux(null);
            }
        }

        return $this;
    }
}
