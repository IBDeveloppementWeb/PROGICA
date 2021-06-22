<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class GiteSearch
{

    /**
     * @var int|null
     */
    private $minSurface;

    /**
     * @var int|null
     */
    private $minCouchage;

    /**
     * @var int|null
     */
    private $minChambre;

    /**
     * @var int|null
     */
    private $maxTarif;

    /**
     * @var boolean|null
     */
    private $animaux;

    /**
     * @var ArrayCollection
     */
    private $equipements;

    public function __construct()
    {
        $this->equipements = new ArrayCollection();
    }

    /**
     * Get the value of minSurface
     *
     * @return  int|null
     */
    public function getMinSurface()
    {
        return $this->minSurface;
    }

    /**
     * Set the value of minSurface
     *
     * @param  int|null  $minSurface
     *
     * @return  self
     */
    public function setMinSurface($minSurface)
    {
        $this->minSurface = $minSurface;

        return $this;
    }

    /**
     * Get the value of minCouchage
     *
     * @return  int|null
     */
    public function getMinCouchage()
    {
        return $this->minCouchage;
    }

    /**
     * Set the value of minCouchage
     *
     * @param  int|null  $minCouchage
     *
     * @return  self
     */
    public function setMinCouchage($minCouchage)
    {
        $this->minCouchage = $minCouchage;

        return $this;
    }

    /**
     * Get the value of minChambre
     *
     * @return  int|null
     */
    public function getMinChambre()
    {
        return $this->minChambre;
    }

    /**
     * Set the value of minChambre
     *
     * @param  int|null  $minChambre
     *
     * @return  self
     */
    public function setMinChambre($minChambre)
    {
        $this->minChambre = $minChambre;

        return $this;
    }

    /**
     * Get the value of maxTarif
     *
     * @return  int|null
     */
    public function getMaxTarif()
    {
        return $this->maxTarif;
    }

    /**
     * Set the value of maxTarif
     *
     * @param  int|null  $maxTarif
     *
     * @return  self
     */
    public function setMaxTarif($maxTarif)
    {
        $this->maxTarif = $maxTarif;

        return $this;
    }

    /**
     * Get the value of equipements
     *
     * @return  ArrayCollection
     */
    public function getEquipements()
    {
        return $this->equipements;
    }

    /**
     * Set the value of equipements
     *
     * @param  ArrayCollection  $equipements
     *
     * @return  self
     */
    public function setEquipements(ArrayCollection $equipements)
    {
        $this->equipements = $equipements;

        return $this;
    }

    /**
     * Get the value of animaux
     *
     * @return  boolean|null
     */
    public function getAnimaux()
    {
        return $this->animaux;
    }

    /**
     * Set the value of animaux
     *
     * @param  boolean|null  $animaux
     *
     * @return  self
     */
    public function setAnimaux($animaux)
    {
        $this->animaux = $animaux;

        return $this;
    }
}
