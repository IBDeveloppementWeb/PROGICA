<?php

namespace App\Controller;

use App\Entity\Gite;
use App\Repository\GiteRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    private GiteRepository $repo;

    public function __construct(GiteRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {

        $repo = $this->getDoctrine()->getRepository(Gite::class);

        $gites = $this->repo->findLatestGite();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'gites' => $gites
        ]);
    }
}
