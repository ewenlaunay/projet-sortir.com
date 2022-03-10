<?php

namespace App\Controller;

use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'profil')]
    public function index(): Response
    {
        $form = $this->createForm(UserType::class);
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
            'user_form' => $form->createView()
        ]);
    }
    #[Route('/profil/show/{id}', name: 'show_profil')]
    public function showProfil(int $id): Response
    {
        return $this->render('profil/sites.html.twig', [
            'controller_name' => 'DetailsProfilController',
        ]);
    }
}
