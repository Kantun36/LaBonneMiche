<?php

namespace App\Form;

use App\Entity\Franchise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FranchiseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Sexe')
            ->add('NomFranchise')
            ->add('PrenomFranchise')
            ->add('TelephoneFranchise')
            ->add('AdresseFranchise')
            ->add('PostalFranchise')
            ->add('VilleFranchise')
            ->add('PaysFranchise')
            ->add('TypeFranchise')
            ->add('PaysProjetFranchise')
            ->add('RegionFranchise')
            ->add('InfoFranchise')
            ->add('RaisonFranchise')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Franchise::class,
        ]);
    }
}
