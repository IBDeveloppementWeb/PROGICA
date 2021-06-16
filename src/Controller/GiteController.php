<?php

namespace App\Controller;

use App\Entity\Gite;
use App\Entity\GiteSearch;
use App\Form\GiteSearchType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GiteController extends AbstractController
{
    /**
     * @Route("/gite", name="gite")
     */


    public function index(Request $request, PaginatorInterface $paginator): Response
    {

        $search = new GiteSearch();
        $form = $this->createForm(GiteSearchType::class, $search);
        $form->handleRequest($request);

        $repo = $this->getDoctrine()->getRepository(Gite::class);

        $data = $repo->findAll();

        $gites = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('gite/index.html.twig', [
            'controller_name' => 'GiteController',
            'gites' => $gites,
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/gite/{id}", name="gite_show")
     */

    public function show($id): Response
    {

        $repo = $this->getDoctrine()->getRepository(Gite::class);

        $gite = $repo->find($id);

        return $this->render('gite/show.html.twig', [
            'controller_name' => 'GiteController',
            'gite' => $gite
        ]);
    }
}
