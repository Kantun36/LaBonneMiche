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



    public function histoire(): Response
    {
        return $this-> render('histoire/index.html.twig' , ['controller_name' => 'HomeController',
        ]);
    }



    public function cgu(): Response
    {
        return $this-> render('cgu/index.html.twig' , ['controller_name' => 'HomeController',
        ]);
    }

    public function engagements(): Response
    {
        return $this-> render('engagements/index.html.twig' , ['controller_name' => 'HomeController',
        ]);
    }


}