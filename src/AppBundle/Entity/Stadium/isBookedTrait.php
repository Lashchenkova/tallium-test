<?php

namespace AppBundle\Entity\Stadium;

trait isBookedTrait
{
    /**
     * @var bool
     */
    private $isBooked;

    /**
     * @return bool
     */
    public function isBooked()
    {
        return $this->isBooked();
    }

    /**
     * Set isBooked
     *
     * @param boolean $isBooked
     *
     * @return $this
     */
    public function setIsBooked(bool $isBooked)
    {
        $this->isBooked = $isBooked;

        return $this;
    }
}