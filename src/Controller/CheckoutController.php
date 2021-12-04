<?php

namespace App\Controller;

use App\Services\PanierServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutController extends AbstractController
{
    /**
     * @Route("/checkout", name="checkout")
     */
    public function index(PanierServices $panierServices): Response
    {
        $user = $this->getUser();
        $panier = $panierServices->getFullPanier();
        return $this->render('checkout/index.html.twig', [
            'controller_name' => 'CheckoutController',
            'panier' => $panier
        ]);
    }
}