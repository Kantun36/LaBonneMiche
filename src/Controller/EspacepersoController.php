<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EspacepersoController extends AbstractController
{
    /**
     * @Route("/espaceperso", name="espaceperso")
     */
    public function index(): Response
    {
        return $this->render('espaceperso/index.html.twig', [
            'controller_name' => 'EspacepersoController',
        ]);
    }
}
