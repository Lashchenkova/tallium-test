<?php

namespace AppBundle\Util;

use AppBundle\Entity\Profile\User;
use AppBundle\Entity\Stadium\BookedSeat;
use AppBundle\Entity\Stadium\Seat;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Config\Definition\Exception\Exception;

class BookedManager
{
    /**
     * @var ObjectManager
     */
    private $objectManager;

    public function __construct(
        ObjectManager $objectManager
    )
    {
        $this->objectManager = $objectManager;
    }

    /**
     * @param Seat $seat
     * @param User $user
     *
     * @return array
     */
    public function reserveSeat(Seat $seat, User $user)
    {
        $reservedSeat = $this->objectManager->getRepository(BookedSeat::class)->findOneBy(['seat' => $seat]);

        if($reservedSeat instanceof BookedSeat){//check if seat was already reserved or seat is in reserve process
            throw new Exception('This seat is already reserved');
        }

        $reservedUser = $this->objectManager->getRepository(BookedSeat::class)->findOneBy(['bookedBy' => $user]);

        if($reservedUser instanceof BookedSeat){
            throw new Exception('You can reserve only one seat.');
        }

        $reservedSeat = new BookedSeat();
        $reservedSeat->setSeat($seat);
        $reservedSeat->setBookedBy($user);

        $this->objectManager->flush();

        return ['reservedSeat' => $reservedSeat];
    }

    /**
     * @param BookedSeat $reservedSeat
     * @param User $user
     * @return array
     */
    public function confirmReserve(BookedSeat $reservedSeat, User $user)
    {
        if($reservedSeat->getBookedBy() !== $user){
            throw new Exception('It is not your seat');
        }

        $reservedSeat->setIsBooked(true);
        $reservedSeat->getSeat()->setIsBooked(true);

        $this->objectManager->persist($reservedSeat);
        $this->objectManager->persist($reservedSeat->getSeat());
        $this->objectManager->flush();

        return ['bookedSeat' => $reservedSeat];
    }

}