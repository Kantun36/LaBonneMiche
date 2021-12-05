<?php
namespace  App\Services;

use App\Entity\Commande;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CommandeService{


    public function creerCommande(EntityManagerInterface $manager,PanierServices $panierServices){
        $commande= new Commande();
        $user = $this->getUser();
        $panier =$panierServices->getFullPanier();
        $commande->setPrixCommande($panier['data'].prixPanier)
                ->setPret(true)
                ->setUserCommande($user);

        foreach ($panier['produits'] as $produit){
            $commande->addProduit($produit);
        }
        $manager->persit($commande);
    }


}