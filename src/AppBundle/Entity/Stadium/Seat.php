<?php

namespace AppBundle\Entity\Stadium;

/**
 * Seat
 */
class Seat
{
    use isBookedTrait;

    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $seatNumber;

    /**
     * @var Row
     */
    private $row;

    /**
     * @var bool
     */
    private $isBooked;

    public function __construct()
    {
        $this->isBooked = false;
    }

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
     * Set seatNumber
     *
     * @param integer $seatNumber
     *
     * @return Seat
     */
    public function setSeatNumber($seatNumber)
    {
        $this->seatNumber = $seatNumber;

        return $this;
    }

    /**
     * Get seatNumber
     *
     * @return integer
     */
    public function getSeatNumber()
    {
        return $this->seatNumber;
    }

    /**
     * Set row
     *
     * @param \AppBundle\Entity\Stadium\Row $row
     *
     * @return Seat
     */
    public function setRow(Row $row)
    {
        $this->row = $row;

        return $this;
    }

    /**
     * Get row
     *
     * @return \AppBundle\Entity\Stadium\Row
     */
    public function getRow()
    {
        return $this->row;
    }

    /**
     * Get isBooked
     *
     * @return boolean
     */
    public function getIsBooked()
    {
        return $this->isBooked;
    }
}
