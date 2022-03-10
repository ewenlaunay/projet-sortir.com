<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GestionController extends AbstractController
{

    #[Route('/gestion/city', name: 'city_gestion')]
    public function cityGestion(): Response
    {
        return $this->render('gestion/city.html.twig', [
            'controller_name' => 'CityGestionController',
        ]);
    }

    #[Route('/gestion/sites', name: 'sites_gestion')]
    public function sitesGestion(): Response
    {
        return $this->render('gestion/sites.html.twig', [
            'controller_name' => 'SitesGestionController',
        ]);
    }
}
