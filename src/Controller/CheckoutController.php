<?php

namespace App\Controller;

use App\Form\AdresseType;
use App\Services\CommandeService;
use App\Services\PanierServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\Translation\t;

class CheckoutController extends AbstractController
{
    /**
     * @Route("/checkout", name="checkout")
     */
    public function index(PanierServices $panierServices, Request $request): Response
    {
        $user = $this->getUser();
        $panier = $panierServices->getFullPanier();
        if (!isset($panier['produits'])){
            return $this->redirectToRoute("home");
        }
        if (!$user->getAdresse()){
            return $this->redirectToRoute("adresse_new");
        }
        $form = $this->createForm(AdresseType::class);

        $form->handleRequest($request);
        return $this->render('checkout/index.html.twig', [
            'controller_name' => 'CheckoutController',
            'panier'=> $panier,
            'checkout'=> $form->createView()
        ]);
    }


    /**
     * @Route ("/checkout/confirm", name="checkout_confirm")
     */
    public function confirm(PanierServices $panierServices,CommandeService $commandeService,Request $request): Response{
        $user = $this->getUser();
        $panier = $panierServices->getFullPanier();
        if (!isset($panier['produits'])){
            return $this->redirectToRoute("home");
        }
        if (!$user->getAdresse()){
            return $this->redirectToRoute("adresse_new");
        }
        $form = $this->createForm(AdresseType::class);

        if ($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();


            return $this->render('checkout/confirm.html.twig', [
                'controller_name' => 'CheckoutController',
                'panier'=> $panier,
                'checkout'=> $form->createView()
            ]);
        }
        $commandeService->creerCommande($panierServices);
        return $this->redirectToRoute('espaceperso');
    }

}



