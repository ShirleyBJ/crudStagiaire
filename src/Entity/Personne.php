<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=PersonneRepository::class)
 * @UniqueEntity(fields={"nom","prenom"},message="Ce nom existe déja ! ")
 */
class Personne
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\NotBlank(message="Le nom est obligatoire")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\NotBlank(message="Le prénom est obligatoire")
     */
    private $prenom;

    /**
     * @ORM\OneToOne(targetEntity=Adresse::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $adresse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(Adresse $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }
}
