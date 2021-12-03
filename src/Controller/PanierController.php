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

        if (!isset($panier['produits'])){
            $this->redirectToRoute("produits");
        }
        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
            'panier' => $panier
        ]);
    }


    /**
     * @Route("/panier/add/{id}", name="panier_add")
     */
    public function addPanier( PanierServices  $panierServices, $id): Response
    {
        $panierServices->addtoPanier($id);
        return $this->redirectToRoute("panier");

    }

    /**
     * @Route("/panier/delete/{id}", name="panier_delete")
     */
    public function deletePanier( PanierServices  $panierServices,$id): Response
    {
        $panierServices->deleteFromPanier($id);
        return $this->redirectToRoute("panier");

    }


    /**
     * @Route("/panier/delete-all/{id}", name="panier_delete_all")
     */
    public function deleteallPanier( PanierServices  $panierServices,$id): Response
    {
        $panierServices->deleteAllToPanier($id);
        return $this->redirectToRoute("panier");

    }

}