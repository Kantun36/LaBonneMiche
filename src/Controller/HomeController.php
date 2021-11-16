<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
class HomeController extends AbstractController
{


    public function home(): Response
    {
        return $this-> render('home/index.html.twig' , ['controller_name' => 'HomeController',
            ]);
    }

    public function produits(): Response
    {
        return $this-> render('produit/index.html.twig' , ['controller_name' => 'ProduitController',
        ]);
    }

    public function actualite(): Response
    {
        return $this-> render('article/index.html.twig' , ['controller_name' => 'ArticleController',
        ]);
    }

    public function histoire(): Response
    {
        return $this-> render('histoire/index.html.twig' , ['controller_name' => 'HomeController',
        ]);
    }

    public function forum(): Response
    {
        return $this-> render('forum.html.twig' , ['controller_name' => 'HomeController',
        ]);
    }
}