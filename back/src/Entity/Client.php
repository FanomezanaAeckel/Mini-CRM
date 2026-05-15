<?php

namespace App\Entity;

use App\Enum\ClientStatut;
use App\Repository\ClientRepository;
use BcMath\Number;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $entreprise = null;

    #[ORM\Column(length: 255)]
    private ?string $poste = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $Ville = null;

    #[ORM\Column(enumType: ClientStatut::class)]
    private ?ClientStatut $status = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $source = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $notes = null;

    #[ORM\Column]
    private ?\DateTime $date_creation = null;

    #[ORM\Column]
    private ?\DateTime $date_modification = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $date_dernier_contact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pays = null;

    /**
     * @var Collection<int, Opportunite>
     */
    #[ORM\OneToMany(targetEntity: Opportunite::class, mappedBy: 'relation')]
    private Collection $opportunites;

    /**
     * @var Collection<int, Interaction>
     */
    #[ORM\OneToMany(targetEntity: Interaction::class, mappedBy: 'client')]
    private Collection $interaction;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $phone = null;

    public function __construct()
    {
        $this->opportunites = new ArrayCollection();
        $this->interaction = new ArrayCollection();
    }

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


    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEntreprise(): ?string
    {
        return $this->entreprise;
    }

    public function setEntreprise(string $entreprise): static
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): static
    {
        $this->poste = $poste;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): static
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): static
    {
        $this->Ville = $Ville;

        return $this;
    }
      public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(?string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getStatus(): ?ClientStatut
    {
        return $this->status;
    }

    public function setStatus(ClientStatut $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): static
    {
        $this->source = $source;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): static
    {
        $this->notes = $notes;

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

    public function getDateDernierContact(): ?\DateTime
    {
        return $this->date_dernier_contact;
    }

    public function setDateDernierContact(?\DateTime $date_dernier_contact): static
    {
        $this->date_dernier_contact = $date_dernier_contact;

        return $this;
    }

    /**
     * @return Collection<int, Opportunite>
     */
    public function getOpportunites(): Collection
    {
        return $this->opportunites;
    }

    public function addOpportunite(Opportunite $opportunite): static
    {
        if (!$this->opportunites->contains($opportunite)) {
            $this->opportunites->add($opportunite);
            $opportunite->setRelation($this);
        }

        return $this;
    }

    public function removeOpportunite(Opportunite $opportunite): static
    {
        if ($this->opportunites->removeElement($opportunite)) {
            // set the owning side to null (unless already changed)
            if ($opportunite->getRelation() === $this) {
                $opportunite->setRelation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Interaction>
     */
    public function getInteraction(): Collection
    {
        return $this->interaction;
    }

    public function addInteraction(Interaction $interaction): static
    {
        if (!$this->interaction->contains($interaction)) {
            $this->interaction->add($interaction);
            $interaction->setClient($this);
        }

        return $this;
    }

    public function removeInteraction(Interaction $interaction): static
    {
        if ($this->interaction->removeElement($interaction)) {
            // set the owning side to null (unless already changed)
            if ($interaction->getClient() === $this) {
                $interaction->setClient(null);
            }
        }

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

  
}
