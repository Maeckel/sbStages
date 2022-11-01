<?php

namespace App\Entity;

use App\Repository\SpecialisteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialisteRepository::class)]
class Specialiste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $nomSpecialiste = null;

    #[ORM\Column(length: 30)]
    private ?string $prenomSpecialiste = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSpecialiste(): ?string
    {
        return $this->nomSpecialiste;
    }

    public function setNomSpecialiste(string $nomSpecialiste): self
    {
        $this->nomSpecialiste = $nomSpecialiste;

        return $this;
    }

    public function getPrenomSpecialiste(): ?string
    {
        return $this->prénomSpecialiste;
    }

    public function setPrenomSpecialiste(string $prenomSpecialiste): self
    {
        $this->prenomSpecialiste = $prenomSpecialiste;

        return $this;
    }
}
