<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ActualiteRepository;
use App\Entity\Categorie;
use App\Entity\TypeActualite;
use App\Entity\Dedicaces;
use App\Form\DedicacesType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Cocur\Slugify\Slugify;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(ActualiteRepository $actu)
    {
        //on recupere les dernieres actualite de la page d'accueil
        $categ = new Categorie();
        $cat = $categ->setLibelle('actualite');
        $lastActu = $actu->ForLastActualite('publier', $cat, 6);

        //cette méthode retourne les 4 dernieres actualités de type bien definie
        $t = new TypeActualite();
        $type = $t->setStation('Politique');
        $lastActuPolitique = $actu->getForLastTypeActu('publier', $cat, 4, $type);

        dump($lastActu);
        dump($lastActuPolitique);
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    /**
     * @Route("/apropos", name="midayi") 
     */
    public function apropos()
    {
        return $this->render('accueil/apropos.html.twig', [
            'title' => 'Midayi fm'
        ]);
    }

    /**
     *  @Route("/dedicaces", name="dedicace")
     */
    public function dedicace(Request $request, ObjectManager $manager)
    {
        $dedicaces = new Dedicaces();
        $form = $this->createForm(DedicacesType::class, $dedicaces);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($dedicaces);
            $manager->flush();

            $this->addFlash('success', 'Votre dédicaces est bien envoyée !');
        }
        return $this->render('accueil/dedicace.html.twig', [
            'title' => 'Dédicaces',
            'form' => $form->createView(),
        ]);
    }
}
