<?php

namespace App\Controller;

use App\Entity\Gite;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Entity\GiteSearch;
use App\Form\GiteSearchType;
use App\Notification\ContactNotification;
use App\Repository\GiteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GiteController extends AbstractController
{

    private GiteRepository $repo;

    public function __construct(GiteRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @Route("/gite", name="gite")
     */


    public function index(Request $request, PaginatorInterface $paginator): Response
    {

        $search = new GiteSearch();
        $form = $this->createForm(GiteSearchType::class, $search);
        $form->handleRequest($request);

        $data = $this->repo->findBySomeField($search);

        $gites = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            12
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

    public function show($id, Request $request, ContactNotification $notification): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $gite = $this->repo->find($id);
        $contact->setGite($gite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $notification->notify($contact);
            $this->addFlash('success', 'Votre email a bien été encoyé');
            return $this->redirectToRoute('gite_show', [
                'id' => $gite->getId(),
            ]);
        }

        return $this->render('gite/show.html.twig', [
            'controller_name' => 'GiteController',
            'gite' => $gite,
            'form' => $form->createView()
        ]);
    }
}
