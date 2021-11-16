<?php

namespace App\Controller\Admin;


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
                yield MenuItem::linkToCrud('Produit', 'fas fa-cart-arrow-down', Produit::class);
                yield MenuItem::linkToLogout('Logout', 'fa fa-exit');
    }
}
