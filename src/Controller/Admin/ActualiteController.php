<?php

namespace App\Controller\Admin;

use App\Entity\Actualite;
use App\Form\ActualiteType;
use App\Entity\TypeActualite;
use App\Repository\ActualiteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/actualite")
 */
class ActualiteController extends AbstractController
{
    /**
     * @Route("/", name="admin_actualite_index", methods={"GET"})
     */
    public function index(ActualiteRepository $actualiteRepository): Response
    {

        $t = new TypeActualite();
        $type = $t->setStation('Actualite');
        $actus = $actualiteRepository->getActualtes($type);
        return $this->render('admin/actualite/index.html.twig', [
            'actualites' => $actus,
            'titre' => 'Liste des articles'
        ]);
    }

    /**
     * @Route("/pages", name="admin_page_index", methods={"GET"})
     */
    public function pages(ActualiteRepository $actualiteRepository): Response
    {

        $t = new TypeActualite();
        $type = $t->setStation('Page');
        $actus = $actualiteRepository->getActualtes($type);
        return $this->render('admin/actualite/index.html.twig', [
            'actualites' => $actus,
            'titre' => 'Liste des pages'
        ]);
    }
    /**
     * @Route("/newpage", name="admin_actualite_newpage", methods={"GET","POST"})
     */
    public function newpage(Request $request): Response
    {
        $actualite = new Actualite();
        $form = $this->createForm(ActualiteType::class, $actualite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($actualite);
            $entityManager->flush();

            return $this->redirectToRoute('admin_actualite_index');
        }

        return $this->render('admin/actualite/new.html.twig', [
            'actualite' => $actualite,
            'form' => $form->createView(),
            'titre' => 'Ajout d\'une page'
        ]);
    }

    /**
     * @Route("/new", name="admin_actualite_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $actualite = new Actualite();
        $form = $this->createForm(ActualiteType::class, $actualite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($actualite);
            $entityManager->flush();

            return $this->redirectToRoute('admin_actualite_index');
        }

        return $this->render('admin/actualite/new.html.twig', [
            'actualite' => $actualite,
            'form' => $form->createView(),
            'titre' => 'Ajout d\'un article'
        ]);
    }

    /**
     * @Route("/{id}", name="admin_actualite_show", methods={"GET"})
     */
    public function show(Actualite $actualite): Response
    {
        return $this->render('admin/actualite/show.html.twig', [
            'actualite' => $actualite,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_actualite_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Actualite $actualite): Response
    {
        $form = $this->createForm(ActualiteType::class, $actualite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_actualite_index', [
                'id' => $actualite->getId(),
            ]);
        }

        return $this->render('admin/actualite/edit.html.twig', [
            'actualite' => $actualite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="actualite_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Actualite $actualite): Response
    {
        if ($this->isCsrfTokenValid('delete' . $actualite->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($actualite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_actualite_index');
    }
}
