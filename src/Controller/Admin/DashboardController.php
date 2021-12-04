<?php

namespace App\Controller\Admin;


use App\Entity\Article;
use App\Entity\Commentaire;
use App\Entity\Ingredient;
use App\Entity\Paragraphe;
use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(ProduitCrudController::class)->generateUrl();

                return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('LaBonneMiche');
    }

    public function configureMenuItems(): iterable
    {

                yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'index');
                yield MenuItem::linkToCrud('Produit', ' fas fa-bread-slice', Produit::class);
                yield MenuItem::linkToCrud('Ingredient', 'fas fa-apple-alt', Ingredient::class);
                yield MenuItem::linkToCrud('Article', 'fas fa-newspaper', Article::class);
                yield MenuItem::linkToCrud('Paragraphe', 'fas fa-sticky-note', Paragraphe::class);
                yield MenuItem::linkToCrud('Commentaire', 'fas fa-comments', Commentaire::class);
                yield MenuItem::linkToLogout('Logout', 'fa fa-exit');
    }
}
