<?php

namespace App\Entity;

use App\Repository\AnimateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimateurRepository::class)]
class Animateur
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $nomAnimateur = null;

    #[ORM\Column(length: 30)]
    private ?string $prenomAnimateur = null;

    #[ORM\OneToMany(mappedBy: 'animateur', targetEntity: Stage::class)]
    private Collection $stage;

    public function __construct()
    {
        $this->stage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAnimateur(): ?string
    {
        return $this->nomAnimateur;
    }

    public function setNomAnimateur(string $nomAnimateur): self
    {
        $this->nomAnimateur = $nomAnimateur;

        return $this;
    }

    public function getPrenomAnimateur(): ?string
    {
        return $this->prenomAnimateur;
    }

    public function setPrenomAnimateur(string $prenomAnimateur): self
    {
        $this->prenomAnimateur = $prenomAnimateur;

        return $this;
    }

    /**
     * @return Collection<int, Stage>
     */
    public function getStage(): Collection
    {
        return $this->stage;
    }

    public function addStage(Stage $stage): self
    {
        if (!$this->stage->contains($stage)) {
            $this->stage->add($stage);
            $stage->setAnimateur($this);
        }

        return $this;
    }

    public function removeStage(Stage $stage): self
    {
        if ($this->stage->removeElement($stage)) {
            // set the owning side to null (unless already changed)
            if ($stage->getAnimateur() === $this) {
                $stage->setAnimateur(null);
            }
        }

        return $this;
    }
    
}
