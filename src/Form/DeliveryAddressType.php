<?php

namespace App\Form;

use App\Entity\DeliveryAddress;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeliveryAddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('country',TextType::class,[
                'label' => 'Pays de livraison',
                'required' => false
            ])
            ->add('city',TextType::class,[
                'label' => 'Ville de livraison',
                'required' => false
            ])
            ->add('postalCode',TextType::class,[
                'label' => 'Code postal de livraison',
                'required' => false
            ])
            ->add('street',TextType::class,[
                'label' => 'Rue de livraison',
                'required' => false
            ])
            ->add('commentary',TextType::class,[
                'label' => 'Commentaire (non requis)',
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DeliveryAddress::class,
        ]);
    }
}
