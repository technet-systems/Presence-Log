<?php


namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PresenceController extends Controller
{
    /**
     * @Route("/", name="presence_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $months = $em->getRepository('AppBundle:Year')
            ->findAllGroupedByMonth();

        return $this->render('presence/index.html.twig', [
            'months' => $months
        ]);
    }

    /**
     * @Route("/show/{month}", name="presence_show")
     */
    public function showAction($month)
    {


        return $this->render('presence/show.html.twig', [
            'month' => $month,
        ]);
    }

    /**
     * @Route("/new", name="presence_new")
     */
    public function newAction()
    {

    }
}