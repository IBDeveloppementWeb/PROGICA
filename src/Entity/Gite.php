<?php

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\GiteRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=GiteRepository::class)
 * @Vich\Uploadable
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
     * @Assert\NotBlank(message="Merci de renseigner un nom")
     * @Assert\Length(
     *      min=5,
     *      max=30,
     *      minMessage= "Le nom doit avoir au moins {{ limit }} caractères",
     *      maxMessage = "Le nom doit avoir au maximum {{ limit }} caractères")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner une adresse")
     * @Assert\Length(
     *      min=10,
     *      max=255,
     *      minMessage= "L'adresse doit avoir au moins {{ limit }} caractères",
     *      maxMessage = "L'adresse doit avoir au maximum {{ limit }} caractères")
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner une ville")
     * @Assert\Length(
     *      min=2,
     *      max=50,
     *      minMessage= "La ville doit avoir au moins {{ limit }} caractères",
     *      maxMessage = "La ville doit avoir au maximum {{ limit }} caractères")
     */
    private $ville;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Merci de renseigner une surface")
     * @Assert\Range(
     *      min=30,
     *      max=300,
     *      notInRangeMessage = "La surface doit être comprise entre {{ min }} et {{ max }} m2")
     */
    private $surface;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Merci de renseigner un nombre de chambre")
     * @Assert\Range(
     *      min=1,
     *      max=20,
     *      notInRangeMessage = "Le nombre de chambres doit être compris entre {{ min }} et {{ max }}")
     */
    private $chambre;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Merci de renseigner un nombre de couchage")
     * @Assert\Range(
     *      min=1,
     *      max=20,
     *      notInRangeMessage = "Le nombre de couchage doit être compris entre {{ min }} et {{ max }}")
     */
    private $couchage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $animaux;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank(message="Merci de renseigner un tarif")
     * @Assert\PositiveOrZero(message="Le tarif doit être positif ou égal à zéro")
     */
    private $tarifAnimaux;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank(message="Merci de renseigner un tarif")
     * @Assert\PositiveOrZero(message="Le tarif doit être positif ou égal à zéro")
     */
    private $tarifHauteSaison;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank(message="Merci de renseigner un tarif")
     * @Assert\PositiveOrZero(message="Le tarif doit être positif ou égal à zéro")
     */
    private $tarifBasseSaison;

    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\NotBlank(message="Merci de renseigner un code postal")
     * @Assert\Length(
     *      min=5,
     *      minMessage = "Le code postal doit avoir {{ min }} chiffres minimum")
     */
    private $codePostal;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Merci de renseigner une description du gite")
     * @Assert\Length(
     *      min=10,
     *      minMessage= "La description doit avoir au moins {{ limit }} caractères")
     */
    private $Description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $addAt;

    /**
     * @ORM\ManyToMany(targetEntity=Equipement::class, inversedBy="gites")
     */
    private $equipements;

    /**
     * @ORM\ManyToMany(targetEntity=Service::class, inversedBy="gites")
     */
    private $services;

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="gite_image", fileNameProperty="imageName")
     */
    private $imageFile;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255)
     * @Assert\Image(
     *      mimeTypes={"image/jpeg", "image/png"},
     *      mimeTypesMessage=" L'image doit avoir les formats {{types}}")
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime", nullable="true")
     * 
     * @var \DateTimeInterface|null
     */
    private $updatedAt;

    public function __construct()
    {
        $this->equipements = new ArrayCollection();
        $this->addAt = new \DateTime();
        $this->services = new ArrayCollection();
        $this->updatedAt = new \DateTime();
    }

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


    public function getAddAt(): ?\DateTimeInterface
    {
        return $this->addAt;
    }

    public function setAddAt(\DateTimeInterface $addAt): self
    {
        $this->addAt = $addAt;

        return $this;
    }

    /**
     * @return Collection|Equipement[]
     */
    public function getEquipements(): Collection
    {
        return $this->equipements;
    }

    public function addEquipement(Equipement $equipement): self
    {
        if (!$this->equipements->contains($equipement)) {
            $this->equipements[] = $equipement;
        }

        return $this;
    }

    public function removeEquipement(Equipement $equipement): self
    {
        $this->equipements->removeElement($equipement);

        return $this;
    }

    /**
     * @return Collection|Service[]
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Service $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        $this->services->removeElement($service);

        return $this;
    }

    /**
     * Get the value of imageFile
     *
     * @return  File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set the value of imageFile
     *
     * @param  File|null  $imageFile
     *
     * @return  self
     */
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;

        if ($this->imageFile instanceof UploadedFile) {
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * Get the value of imageName
     *
     * @return  string|null
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set the value of imageName
     *
     * @param  string|null  $imageName
     *
     * @return  self
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get the value of updatedAt
     *
     * @return  \DateTimeInterface|null
     */
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @param  \DateTimeInterface|null  $updatedAt
     *
     * @return  self
     */
    public function setUpdatedAt(\DateTimeInterface $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
