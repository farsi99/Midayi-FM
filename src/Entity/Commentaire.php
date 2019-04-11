<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentaireRepository")
 */
class Commentaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $publication;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $auteur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Actualite", inversedBy="commentaires")
     */
    private $actualite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

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

    public function getPublication(): ?\DateTimeInterface
    {
        return $this->publication;
    }

    public function setPublication(?\DateTimeInterface $publication): self
    {
        $this->publication = $publication;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(?string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getActualite(): ?Actualite
    {
        return $this->actualite;
    }

    public function setActualite(?Actualite $actualite): self
    {
        $this->actualite = $actualite;

        return $this;
    }
}
