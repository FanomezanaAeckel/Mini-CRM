<?php

namespace App\Entity;

use App\Repository\OpportuniteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpportuniteRepository::class)]
class Opportunite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $Montant = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $date_cloture = null;

    #[ORM\Column]
    private ?int $probabilite = null;

    #[ORM\Column]
    private ?\DateTime $date_creation = null;

    #[ORM\Column]
    private ?\DateTime $date_modification = null;

    #[ORM\ManyToOne(inversedBy: 'opportunites')]
    private ?Client $relation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->Montant;
    }

    public function setMontant(string $Montant): static
    {
        $this->Montant = $Montant;

        return $this;
    }

    public function getDateCloture(): ?\DateTime
    {
        return $this->date_cloture;
    }

    public function setDateCloture(?\DateTime $date_cloture): static
    {
        $this->date_cloture = $date_cloture;

        return $this;
    }

    public function getProbabilite(): ?int
    {
        return $this->probabilite;
    }

    public function setProbabilite(int $probabilite): static
    {
        $this->probabilite = $probabilite;

        return $this;
    }

    public function getDateCreation(): ?\DateTime
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTime $date_creation): static
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    public function getDateModification(): ?\DateTime
    {
        return $this->date_modification;
    }

    public function setDateModification(\DateTime $date_modification): static
    {
        $this->date_modification = $date_modification;

        return $this;
    }

    public function getRelation(): ?Client
    {
        return $this->relation;
    }

    public function setRelation(?Client $relation): static
    {
        $this->relation = $relation;

        return $this;
    }
}
