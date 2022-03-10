<?php

namespace App\Controller;

use App\Form\FilterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $form = $this->createForm(FilterType::class);
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'filter_form' => $form->createView()
        ]);
    }

    public function search(Request $request, Form $form): Response
    {
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $constrain = $form->getData();
            // TODO build query with request constrains applied
            return $this->redirectToRoute('task_success');
        }
        return $this->redirect('/');
    }
}
