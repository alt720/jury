<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
        ->add('name',TextType::class,[
            'label' => 'Nom du produit',
            'attr' => [
                'placeholder' => 'Taper le nom ici...'
            ],
            'required' => false
        ])
        ->add('file',FileType::class,[
            'mapped' => false,
            'label' => 'Upload une image',
            'required' => false,
            'constraints' => [
                new NotBlank([
                    'message' => 'Vous devez ajouter une image'
                ]),
                new File([
                    'maxSize' => '1m',
                    'maxSizeMessage' => 'Le poids ne peut dépasser 1mo. Votre fichier est trop lourd.'
                ])
            ]
        ])
            ->add('price',MoneyType::class,[
                'label' => 'Prix du produit',
                'required' => false,
                'divisor' => 100
            ])

            ->add('category',EntityType::class,[
                'class' => Category::class,
                'choice_label' => 'name',
                'required' => false,
                'placeholder' => '--Choisir une catégorie--'
            ])
        ;
    }
        

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
