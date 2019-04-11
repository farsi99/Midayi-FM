<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActualiteRepository")
 */
class Actualite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $lead;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contenu;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $auteur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie", inversedBy="actualites")
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="actualite")
     */
    private $commentaires;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeActualite", inversedBy="actualites")
     */
    private $typeActualite;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $ordreAffichage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $etatPub;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $formatActu;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): ? int
    {
        return $this->id;
    }

    public function getTitre(): ? string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getLead(): ? string
    {
        return $this->lead;
    }

    public function setLead(? string $lead): self
    {
        $this->lead = $lead;

        return $this;
    }

    public function getContenu(): ? string
    {
        return $this->contenu;
    }

    public function setContenu(? string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getImage(): ? string
    {
        return $this->image;
    }

    public function setImage(? string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCreatedAt(): ? \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getAuteur(): ? string
    {
        return $this->auteur;
    }

    public function setAuteur(? string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getCategorie(): ? Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(? Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setActualite($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->contains($commentaire)) {
            $this->commentaires->removeElement($commentaire);
            // set the owning side to null (unless already changed)
            if ($commentaire->getActualite() === $this) {
                $commentaire->setActualite(null);
            }
        }

        return $this;
    }

    public function getTypeActualite(): ? TypeActualite
    {
        return $this->typeActualite;
    }

    public function setTypeActualite(? TypeActualite $typeActualite): self
    {
        $this->typeActualite = $typeActualite;

        return $this;
    }

    public function getOrdreAffichage(): ? bool
    {
        return $this->ordreAffichage;
    }

    public function setOrdreAffichage(? bool $ordreAffichage): self
    {
        $this->ordreAffichage = $ordreAffichage;

        return $this;
    }

    public function getEtatPub(): ? string
    {
        return $this->etatPub;
    }

    public function setEtatPub(? string $etat): self
    {
        $this->etatPub = $etat;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getFormatActu(): ?string
    {
        return $this->formatActu;
    }

    public function setFormatActu(?string $formatActu): self
    {
        $this->formatActu = $formatActu;

        return $this;
    }
}
