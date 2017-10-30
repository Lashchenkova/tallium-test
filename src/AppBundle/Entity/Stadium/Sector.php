<?php

namespace AppBundle\Entity\Stadium;

/**
 * Sector
 */
class Sector
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $sectorName;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sectorName
     *
     * @param string $sectorName
     *
     * @return Sector
     */
    public function setSectorName($sectorName)
    {
        $this->sectorName = $sectorName;

        return $this;
    }

    /**
     * Get sectorName
     *
     * @return string
     */
    public function getSectorName()
    {
        return $this->sectorName;
    }
}
