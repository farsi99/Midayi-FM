<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class AdminAccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="admin_accueil")
     */
    public function index()
    {
        return $this->render('admin/accueil/index.html.twig', [
            'title' => 'Amdin Midayi FM',
        ]);
    }
}
