<?php

namespace App\Controller\Admin;

use App\Entity\Paragraphe;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ParagrapheCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Paragraphe::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titreParagraphe'),
            TextEditorField::new('contenuParagraphe'),
            AssociationField::new('article'),
            ImageField::new('image')->setUploadDir("public/img/paragraphes")
                ->setBasepath("public/img/paragraphes"),
        ];
    }

}
