<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Stadium\Seat;
use Knp\Component\Pager\Paginator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @param Request $request
     * @param Paginator $paginator
     *
     * @Template()
     * @Route("/", name="homepage")
     *
     * @return array
     */
    public function indexAction(Request $request, Paginator $paginator)
    {
        $seats = $paginator->paginate(
            $this->getDoctrine()->getRepository(Seat::class)->findAllSeats(),
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 30)
        );

        $countFreeSeats = $this->getDoctrine()->getRepository(Seat::class)->countFreeSeats();

        return ['seats' => $seats, 'totalFreeSeats' => $countFreeSeats];
    }
}