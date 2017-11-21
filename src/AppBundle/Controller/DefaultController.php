<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Video;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $films_disponible = $this->getDoctrine()
        ->getRepository(Video::class)
        ->findAvailable();

        $film_prochainement_disponible = $this->getDoctrine()
        ->getRepository(Video::class)
        ->findComingSoon();


        return $this->render('AppBundle::films.html.twig', [
            'films_disponible' => $films_disponible,
            'films_prochainement_disponible' => $film_prochainement_disponible,
        ]);
    }
}
