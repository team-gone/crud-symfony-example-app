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
     *
     * @return EngineInterface
     */
    public function indexAction()
    {
        $filmsAvailable = $this->getDoctrine()
        ->getRepository(Video::class)
        ->findAvailable();

        $filmsComingSoon = $this->getDoctrine()
        ->getRepository(Video::class)
        ->findComingSoon();

        return $this->render('AppBundle::films.html.twig', [
            'filmsAvailable' => $filmsAvailable,
            'filmsComingSoon' => $filmsComingSoon,
        ]);
    }
}
