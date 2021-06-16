<?php

namespace App\Entity;

use App\Repository\GiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GiteRepository::class)
 */
class Gite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer")
     */
    private $surface;

    /**
     * @ORM\Column(type="integer")
     */
    private $chambre;

    /**
     * @ORM\Column(type="integer")
     */
    private $couchage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $animaux;

    /**
     * @ORM\Column(type="float")
     */
    private $tarifAnimaux;

    /**
     * @ORM\Column(type="float")
     */
    private $tarifHauteSaison;

    /**
     * @ORM\Column(type="float")
     */
    private $tarifBasseSaison;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $codePostal;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getChambre(): ?int
    {
        return $this->chambre;
    }

    public function setChambre(int $chambre): self
    {
        $this->chambre = $chambre;

        return $this;
    }

    public function getCouchage(): ?int
    {
        return $this->couchage;
    }

    public function setCouchage(int $couchage): self
    {
        $this->couchage = $couchage;

        return $this;
    }

    public function getAnimaux(): ?bool
    {
        return $this->animaux;
    }

    public function setAnimaux(bool $animaux): self
    {
        $this->animaux = $animaux;

        return $this;
    }

    public function getTarifAnimaux(): ?float
    {
        return $this->tarifAnimaux;
    }

    public function setTarifAnimaux(float $tarifAnimaux): self
    {
        $this->tarifAnimaux = $tarifAnimaux;

        return $this;
    }

    public function getTarifHauteSaison(): ?float
    {
        return $this->tarifHauteSaison;
    }

    public function setTarifHauteSaison(float $tarifHauteSaison): self
    {
        $this->tarifHauteSaison = $tarifHauteSaison;

        return $this;
    }

    public function getTarifBasseSaison(): ?float
    {
        return $this->tarifBasseSaison;
    }

    public function setTarifBasseSaison(float $tarifBasseSaison): self
    {
        $this->tarifBasseSaison = $tarifBasseSaison;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
