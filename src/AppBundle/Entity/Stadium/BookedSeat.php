<?php

namespace AppBundle\Entity\Stadium;

use AppBundle\Entity\Profile\User;

/**
 * BookedSeat
 */
class BookedSeat
{
    use isBookedTrait;

    /**
     * @var int
     */
    private $id;

    /**
     * @var User
     */
    private $bookedBy;

    /**
     * @var Seat
     */
    private $seat;

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
     * Set seat
     *
     * @param \AppBundle\Entity\Stadium\Seat $seat
     *
     * @return BookedSeat
     */
    public function setSeat(Seat $seat)
    {
        $this->seat = $seat;

        return $this;
    }

    /**
     * Get seat
     *
     * @return \AppBundle\Entity\Stadium\Seat
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * Set bookedBy
     *
     * @param \AppBundle\Entity\Profile\User $bookedBy
     *
     * @return BookedSeat
     */
    public function setBookedBy(User $bookedBy)
    {
        $this->bookedBy = $bookedBy;

        return $this;
    }

    /**
     * Get bookedBy
     *
     * @return \AppBundle\Entity\Profile\User
     */
    public function getBookedBy()
    {
        return $this->bookedBy;
    }
}
