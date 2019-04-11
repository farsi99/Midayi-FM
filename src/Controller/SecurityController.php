<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/registration", name="registration")
     */
    public function inscription(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $hashuser = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hashuser);
            $user->addRole('ROLE_USER');
            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute('security_login');
        }
        return $this->render('security/registration.html.twig', [
            'title' => 'Inscription',
            'form' => $form->createView()
        ]);
    }

    /**
     * Cette fonction permet de connecter les personnes
     * @Route("/connexion", name="security_login")
     */
    public function connexion(AuthenticationUtils $auth)
    {
        $error = $auth->getLastAuthenticationError();
        $lastuser = $auth->getLastUsername();
        return $this->render(
            'security/connexion.html.twig',
            [
                'title' => 'Connexion',
                'error' => $error !== null,
                'utilisateur' => $lastuser
            ]
        );
    }

    /**
     * cette méthode traite la deconnexion
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout()
    { }

    /** 
     * @Route("/success",name="security_success")
     */
    public function success(AuthorizationCheckerInterface $auth)
    {
        if ($auth->isGranted('ROLE_ADMIN') == true) {
            return $this->redirectToRoute('admin_accueil');
        } elseif ($auth->isGranted('ROLE_USER') == true) {
            return $this->redirectToRoute("accueil");
        }
    }
}
