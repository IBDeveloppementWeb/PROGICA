<?php

namespace App\Controller;

use App\Entity\Gite;
use App\Form\GiteType;
use App\Repository\GiteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AdminController extends AbstractController
{
    private GiteRepository $giteRepository;
    private EntityManagerInterface $em;

    public function __construct(GiteRepository $giteRepository, EntityManagerInterface $em)
    {
        $this->giteRepository = $giteRepository;
        $this->em = $em;
    }
    /**
     * @route("/admin", name="admin.index")
     */

    public function index(Request $request, PaginatorInterface $paginator): Response
    {

        $repo = $this->getDoctrine()->getRepository(Gite::class);

        $data = $repo->findAll();

        $gites = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'gites' => $gites,
        ]);
    }

    /**
     *  @Route("/admin/new", name="admin.new")
     */
    public function new(Request $request)
    {
        $gite = new Gite();
        $form = $this->createForm(GiteType::class, $gite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($gite);
            $this->em->flush();
            return $this->redirectToRoute('admin.index');
        }
        return $this->render('admin/new.html.twig', [
            'controller_name' => 'AdminController',
            'formGite'  => $form->createView()
        ]);
    }

    /**
     *  @Route("/admin/edit", name="admin_edit")
     */
    public function edit($id, Request $request)
    {
        $repo = $this->getDoctrine()->getRepository(Gite::class);

        $gite = $repo->find($id);

        $form = $this->createForm(GiteType::class, $gite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($gite);
            $this->em->flush();
            return $this->redirectToRoute('admin_edit');
        }
        return $this->render('admin/edit.html.twig', [
            'controller_name' => 'AdminController',
            'gite' => $gite,
            'formGite'  => $form->createView()
        ]);
    }
}
