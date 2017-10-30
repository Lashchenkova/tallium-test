<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Profile\User;
use AppBundle\Entity\Stadium\BookedSeat;
use AppBundle\Entity\Stadium\Seat;
use AppBundle\Util\BookedManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReservationController extends Controller
{
    /**
     * @Route("/reserve/{id}", name="reserve")
     *
     * @param Seat $seat
     * @param BookedManager $bookedManager
     * @param User $user
     *
     * @return array
     */
    public function reserveAction(Seat $seat, BookedManager $bookedManager, User $user)
    {
        $data = $bookedManager->reserveSeat($seat, $user);

        return $data;
    }

    /**
     * @Route("/confirm_reservation/{id}", name="confirm_reserve")
     *
     * @param BookedSeat $seat
     * @param BookedManager $bookedManager
     * @param User $user
     *
     * @return array
     */
    public function confirmReserveAction(BookedSeat $seat, BookedManager $bookedManager, User $user)
    {
        $data = $bookedManager->confirmReserve($seat, $user);

        return $data;
    }

    /**
     * @Route("/reservation/{q}", name="show_reserve", requirements={"q": "reserved|in_process"})
     *
     * @param string $q
     *
     * @return array
     */
    public function showReservedSeatsAction(string $q)
    {
        $seats = $this->getDoctrine()->getRepository(BookedSeat::class)->findByQ($q);

        return ['seats' => $seats];
    }
}