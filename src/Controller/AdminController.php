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
    private GiteRepository $repo;
    private EntityManagerInterface $em;

    public function __construct(GiteRepository $repo, EntityManagerInterface $em)
    {
        $this->repo = $repo;
        $this->em = $em;
    }
    /**
     * @route("/admin", name="admin.index")
     */

    public function index(Request $request, PaginatorInterface $paginator): Response
    {

        $data = $this->repo->findAll();

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
     *  @Route("/admin/edit/{id}", name="admin.edit", methods="GET|POST")
     */
    public function edit($id, Request $request)
    {

        $gite = $this->repo->find($id);

        $form = $this->createForm(GiteType::class, $gite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($gite);
            $this->em->flush();
            return $this->redirectToRoute('admin.index');
        }
        return $this->render('admin/edit.html.twig', [
            'controller_name' => 'AdminController',
            'gite' => $gite,
            'formGite'  => $form->createView()
        ]);
    }
}
