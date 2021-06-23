<?php

namespace App\Form;

use App\Entity\Gite;
use App\Entity\Service;
use App\Entity\Equipement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class GiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'required' => false,
                'label' => 'Nom du gite'
            ])
            ->add('adresse', TextType::class, [
                'required' => false
            ])
            ->add('surface', NumberType::class, [
                'required' => false,
                'label' => 'Surface en m2'
            ])
            ->add('chambre', NumberType::class, [
                'required' => false,
                'label' => 'Nombre de chambre(s)'
            ])
            ->add('couchage', NumberType::class, [
                'required' => false,
                'label' => 'Nombre de couchage(s)'
            ])
            ->add('animaux', CheckboxType::class, [
                'required' => false,
                'label' => 'Cocher la case si les animaux sont acceptés',
            ])
            ->add('description', TextareaType::class, [
                'required' => false,
                'label' => 'Description du gite'
            ])
            ->add('imageFile', FileType::class, [
                'required' => false,
                'label' => 'Ajouter une image'
            ])
            ->add('tarifAnimaux', NumberType::class, [
                'required' => false,
                'label' => 'Tarif Animaux'
            ])
            ->add('tarifBasseSaison', NumberType::class, [
                'required' => false,
                'label' => 'Tarif Hebdomadaire en Basse Saison'
            ])
            ->add('tarifHauteSaison', NumberType::class, [
                'required' => false,
                'label' => 'Tarif Hebdomadaire en Haute Saison'
            ])
            ->add('ville', TextType::class, [
                'required' => false
            ])
            ->add('codePostal', TextType::class, [
                'required' => false
            ])
            ->add('equipements', EntityType::class, [
                'class' => Equipement::class,
                'label' => 'Equipements disponibles',
                'choice_label' => 'nom',
                'multiple' => true,
                'expanded' => true
            ])
            ->add('services', EntityType::class, [
                'class' => Service::class,
                'label' => 'Services proposés',
                'choice_label' => 'nom',
                'multiple' => true,
                'expanded' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gite::class,
        ]);
    }
}
