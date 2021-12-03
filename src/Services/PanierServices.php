<?php
namespace  App\Services;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PanierServices{

    private $session;
    private $produitRepository;

    public function  __construct(SessionInterface $session, ProduitRepository $produitRepository){
        $this->session=$session;
        $this->produitRepository=$produitRepository;
    }

    public function addtoPanier($id){
        $panier = $this->getPanier();
        if (isset($panier[$id])){
            $panier[$id]++;
        }
        else{
            $panier[$id]=1;
        }
        $this->updatePanier($panier);
    }

    public function deleteFromPanier($id){
        $panier = $this->getPanier();
        if (isset($panier[$id])){
            if ($panier[$id]>1){
                $panier[$id]--;
            }
            else{
                unset($panier[$id]);
            }
        }
        $this->updatePanier($panier);
    }
    public function deleteAllToPanier($id){
        $panier = $this->getPanier();
        if (isset($panier[$id])){
            unset($panier[$id]);
        }
        $this->updatePanier($panier);
    }

    public function deletPanier(){
        $this->updatePanier([]);
    }

    public function updatePanier($panier){
        $this->session->set('panier',$panier);
        $this->session->set('panierData',$this->getFullPanier());
    }

    public function getPanier(){
        return $this->session->get('panier',[]);
    }

    public function  getFullPanier(){
        $panier = $this->getPanier();

        $fullPanier = [];
        $quantitePanier = 0;
        $prixPanier=0;
        foreach ($panier as $id => $quantite){
            $produit = $this->produitRepository->find($id);
            if ($produit){
                $fullPanier['produits'][] =
                    [
                        "quantite" => $quantite,
                        "produit" => $produit
                    ];
                $quantitePanier=$quantitePanier+$quantite;
                $prixPanier=$quantite * $produit->getPrixProduit();
            }
            else{
                $this->deleteFromPanier($id);
            }
        }
        $fullPanier['data']=[
            "quantitePanier" => $quantitePanier,
            "prixPanier" => $prixPanier
        ];

        return $fullPanier;
    }
}