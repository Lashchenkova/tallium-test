<?php

namespace AppBundle\Entity\Stadium;

/**
 * Row
 */
class Row
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $rowNumber;

    /**
     * @var Sector
     */
    private $sector;

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
     * @var \AppBundle\Entity\Stadium\Sector
     */
    private $row;


    /**
     * Set rowNumber
     *
     * @param integer $rowNumber
     *
     * @return Row
     */
    public function setRowNumber($rowNumber)
    {
        $this->rowNumber = $rowNumber;

        return $this;
    }

    /**
     * Get rowNumber
     *
     * @return integer
     */
    public function getRowNumber()
    {
        return $this->rowNumber;
    }

    /**
     * Set row
     *
     * @param \AppBundle\Entity\Stadium\Sector $row
     *
     * @return Row
     */
    public function setRow(Sector $row)
    {
        $this->row = $row;

        return $this;
    }

    /**
     * Get row
     *
     * @return \AppBundle\Entity\Stadium\Sector
     */
    public function getRow()
    {
        return $this->row;
    }

    /**
     * Set sector
     *
     * @param \AppBundle\Entity\Stadium\Sector $sector
     *
     * @return Row
     */
    public function setSector(Sector $sector)
    {
        $this->sector = $sector;

        return $this;
    }

    /**
     * Get sector
     *
     * @return \AppBundle\Entity\Stadium\Sector
     */
    public function getSector()
    {
        return $this->sector;
    }
}
