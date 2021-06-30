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
     * @route("/admin", name="admin_index")
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
     *  @Route("/admin/new", name="admin_new", methods="GET|POST")
     */
    public function new(Request $request)
    {
        $gite = new Gite();
        $form = $this->createForm(GiteType::class, $gite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($gite);
            $this->em->flush();
            $this->addFlash('success', 'Bien ajouté avec succès');

            return $this->redirectToRoute('admin_index');
        }
        return $this->render('admin/new.html.twig', [
            'controller_name' => 'AdminController',
            'formGite'  => $form->createView()
        ]);
    }

    /**
     *  @Route("/admin/edit/{id}", name="admin_edit", methods="GET|POST")
     */
    public function edit($id, Request $request)
    {

        $gite = $this->repo->find($id);

        $form = $this->createForm(GiteType::class, $gite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($gite);
            $this->em->flush();
            $this->addFlash('primary', 'Bien modifié avec succès');

            return $this->redirectToRoute('admin_index');
        }
        return $this->render('admin/edit.html.twig', [
            'controller_name' => 'AdminController',
            'gite' => $gite,
            'formGite'  => $form->createView()
        ]);
    }

    /**
     *  @Route("/admin/delete/{id}", name="admin_delete")
     */
    public function delete($id)
    {

        $gite = $this->repo->find($id);

        $this->em->remove($gite);
        $this->em->flush();
        $this->addFlash('danger', 'Bien supprimé avec succès');

        return $this->redirectToRoute('admin_index');
    }
}
