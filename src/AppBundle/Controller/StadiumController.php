<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Stadium\Seat;
use AppBundle\Entity\Stadium\Sector;
use Knp\Component\Pager\Paginator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StadiumController extends Controller
{
    /**
     * @Template()
     * @Route("/sector/{id}", name="sector", requirements={"id": "\d+"})
     *
     * @param Sector $sector
     * @param Paginator $paginator
     * @param Request $request
     * @return array
     */
    public function indexAction(Sector $sector, Paginator $paginator, Request $request)
    {
        $seats = $paginator->paginate(
            $seats = $this->getDoctrine()->getRepository(Seat::class)->findBySector($sector),
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 30)
        );

        $countFreeSeats = $this->getDoctrine()->getRepository(Seat::class)->countFreeSeats($sector);

        return ['seats' => $seats, 'totalFreeSeats' => $countFreeSeats];
    }
}