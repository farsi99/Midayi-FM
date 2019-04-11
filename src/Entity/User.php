<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 * fields ={"email"},
 * message="l'email que vous avez indiqué est déjà utilisé !")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\Email(message="Veuillez saisir un email valide")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=6, minMessage="Le mot de passe doit contenir 5 caractère minimuim")
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password", message="Confirme mot de passe doit être identique avec votre mot de passe")
     */
    public $confirm_password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $civilite;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $roles = [];

    public function getId(): ? int
    {
        return $this->id;
    }

    public function getEmail(): ? string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername(): ? string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ? string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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

    public function getCivilite(): ? string
    {
        return $this->civilite;
    }

    public function setCivilite(? string $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Returns the roles or permissions granted to the user for security.
     */
    public function getRoles(): ? array
    {
        if (empty($this->roles)) {
            return ["ROLE_USER"];
        }
        return $this->roles;
    }

    public function addRole($roles)
    {
        return $this->roles = [$roles];
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * {@inheritdoc}
     */
    public function getSalt(): ? string
    {
        // See "Do you need to use a Salt?" at https://symfony.com/doc/current/cookbook/security/entity_provider.html
        // we're using bcrypt in security.yml to encode the password, so
        // the salt value is built-in and you don't have to generate one

        return null;
    }

    /**
     * Removes sensitive data from the user.
     *
     * {@inheritdoc}
     */
    public function eraseCredentials(): void
    {
        // if you had a plainPassword property, you'd nullify it here
        // $this->plainPassword = null;
    }
}
