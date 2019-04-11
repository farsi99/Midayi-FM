<?php

namespace App\Entity;

use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DedicacesRepository")
 */
class Dedicaces
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     * @Assert\NotBlank()
     */
    private $civilite;

    /**
     * @ORM\Column(type="string", length=75)
     * @Assert\NotBlank()
     * @Assert\Length(min=2)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Email(message="Veuillez saisir un email valide")
     * 
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chanson;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeChanson;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $artisite;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $destinataire;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $lue;

    public function getId(): ? int
    {
        return $this->id;
    }

    public function getCivilite(): ? string
    {
        return $this->civilite;
    }

    public function setCivilite(? string $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getNom(): ? string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ? string
    {
        return $this->prenom;
    }

    public function setPrenom(? string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ? string
    {
        return $this->adresse;
    }

    public function setAdresse(? string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ? string
    {
        return $this->codePostal;
    }

    public function setCodePostal(? string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ? string
    {
        return $this->ville;
    }

    public function setVille(? string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getEmail(): ? string
    {
        return $this->email;
    }

    public function setEmail(? string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ? string
    {
        return $this->telephone;
    }

    public function setTelephone(? string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getChanson(): ? string
    {
        return $this->chanson;
    }

    public function setChanson(? string $chanson): self
    {
        $this->chanson = $chanson;

        return $this;
    }

    public function getTypeChanson(): ? string
    {
        return $this->typeChanson;
    }

    public function setTypeChanson(? string $typeChanson): self
    {
        $this->typeChanson = $typeChanson;

        return $this;
    }

    public function getArtisite(): ? string
    {
        return $this->artisite;
    }

    public function setArtisite(? string $artisite): self
    {
        $this->artisite = $artisite;

        return $this;
    }

    public function getDestinataire(): ? string
    {
        return $this->destinataire;
    }

    public function setDestinataire(? string $destinataire): self
    {
        $this->destinataire = $destinataire;

        return $this;
    }

    public function getLue(): ? bool
    {
        return $this->lue;
    }

    public function setLue(? bool $lue): self
    {
        $this->lue = $lue;

        return $this;
    }
}
