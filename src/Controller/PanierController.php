<?php

namespace App\Controller;

use App\Services\PanierServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index( PanierServices  $panierServices): Response
    {
        $panier= $panierServices->getFullPanier();

        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
            'panier' => $panier
        ]);
    }


    /**
     * @Route("/panier/add/{id}" ="panier_add")
     */
    public function addPanier( PanierServices  $panierServices, $id): Response
    {
        $panierServices->addtoPanier($id);
        return $this->redirectToRoute("panier");

    }

    /**
     * @Route("/panier/delete/{id}" name="panier_delete")
     */
    public function deletePanier( PanierServices  $panierServices,$id): Response
    {
        $panierServices->deleteFromPanier($id);
        return $this->redirectToRoute("panier");

    }

}


