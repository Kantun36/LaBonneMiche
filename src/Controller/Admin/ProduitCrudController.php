<?php

namespace App\Controller\Admin;

use App\Controller\ImageController;
use App\Entity\Produit;
use APp\Entity\Image;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nomProduit'),
            ChoiceField::new('Categorie')->setChoices(
                [
                    'Pain'=>'Pain',
                    'Baguette'=>'Baguette',
                    'Miche'=>'Miche',
                    'Vienoiserie'=>'Vienoiserie',
                    'Sandwich'=>'Sandwich',
                    'Patisserie'=>'Patisserie',

                ]
            ),

            TextEditorField::new('DescriptionProduit'),
            NumberField::new('prixProduit'),
            IntegerField::new('quantiteProduit'),
            NumberField::new('poidsProduit'),
            AssociationField::new('Ingredients'),
            ImageField::new('imageProduit')->setUploadDir("public\img\produits")
                ->setBasepath("public\img\produits"),


        ];
    }

}
