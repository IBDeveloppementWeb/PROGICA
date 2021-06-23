<?php

namespace App\Form;

use Attribute;
use App\Entity\Gite;
use App\Entity\Service;
use App\Entity\Equipement;
use App\Entity\GiteSearch;
use Doctrine\DBAL\Types\StringType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class GiteSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('minSurface', IntegerType::class, [
                'required' => false,
                'label' => 'Filter par surface',
                'attr' => [
                    'placeholder' => 'Surface minimale'
                ]
            ])
            ->add('minCouchage', IntegerType::class, [
                'required' => false,
                'label' => 'Filter par couchage',
                'attr' => [
                    'placeholder' => 'Couchages minimum'
                ]
            ])
            ->add('minChambre', IntegerType::class, [
                'required' => false,
                'label' => 'Filter par chambre',
                'attr' => [
                    'placeholder' => 'Chambres minimum'
                ]
            ])
            ->add('maxTarif', IntegerType::class, [
                'required' => false,
                'label' => 'Filter par tarif',
                'attr' => [
                    'placeholder' => 'Tarif maximum'
                ]
            ])
            ->add('animaux', CheckboxType::class, [
                'required' => false,
                'label' => 'Animaux acceptés'
            ])
            ->add('equipements', EntityType::class, [
                'required' => false,
                'class' => Equipement::class,
                'choice_label' => 'nom',
                'label' => 'Filtrer par équipement',
                'multiple' => true
            ])
            ->add('ville', TextType::class, [
                'required' => false,
                'label' => 'Filtrer par ville',
                'attr' => [
                    'placeholder' => 'Entrer une ville'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GiteSearch::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
