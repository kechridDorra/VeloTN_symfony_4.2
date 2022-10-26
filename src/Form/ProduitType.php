<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\User1;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_produit')
            ->add('description_produit')
            ->add('prix_produit')
            ->add('marque_produit')
            ->add('image_produit',FileType::class)
            ->add('nom',EntityType::class,array('class'=>User::class,'choice_nom'=>'nom'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
