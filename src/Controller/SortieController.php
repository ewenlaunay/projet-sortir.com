<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SortieController extends AbstractController
{
    #[Route('/sortie', name: 'sortie')]
    public function index(): Response
    {
        return $this->render('sortie/sites.html.twig', [
            'controller_name' => 'SortieController',
        ]);
    }

    #[Route('/sortie/new', name: 'create_sortie')]
    public function newSortie(): Response
    {
        return $this->render('sortie/create.html.twig', [
            'controller_name' => 'CreateSortieController',
        ]);
    }
    #[Route('/sortie/show/{id}', name: 'show_sortie')]
    public function showSortie(): Response
    {
        return $this->render('sortie/show.html.twig', [
            'controller_name' => 'ShowSortieController',
        ]);
    }

    #[Route('/sortie/modify/{id}', name: 'modify_sortie')]
    public function modifySortie(): Response
    {
        return $this->render('sortie/modify.html.twig', [
            'controller_name' => 'ModifySortieController',
        ]);
    }

    #[Route('/sortie/cancel/{id}', name: 'cancel_sortie')]
    public function cancelSortie(): Response
    {
        return $this->render('sortie/cancel.html.twig', [
            'controller_name' => 'CancelSortieController',
        ]);
    }

    public function create(): void{
        // implement ajout en bdd
    }
}
