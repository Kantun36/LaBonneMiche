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
                $panier[id]--;
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
    }

    public function getPanier(){
        return $this->session->get('panier',[]);
    }

    public function  getFullPanier(){
        $panier = $this->getPanier();

        $fullPanier = [];
        foreach ($panier as $id => $quantite){
            $produit = $this->produitRepository->find($id);
            if ($produit){
                $fullPanier[] =
                    [
                        "quantite " => $quantite,
                        "produit" => $produit
                    ];
            }
            else{
                $this->deleteFromPanier($id);
            }
        }
        return $fullPanier;
    }
}