<?php

namespace App\Form;

use App\Entity\Paragraphe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParagrapheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numeroParagraphe')
            ->add('titreParagraphe')
            ->add('contenuParagraphe')
            ->add('image')
            ->add('article')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Paragraphe::class,
        ]);
    }
}
