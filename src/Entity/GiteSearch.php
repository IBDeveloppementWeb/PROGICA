<?php

namespace App\Entity;


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
}
