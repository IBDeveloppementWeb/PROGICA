<?php

namespace App\Form;

use App\Entity\Gite;
use App\Entity\Ville;
use App\Entity\Service;
use App\Entity\Equipement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class GiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('adresse')
            ->add('surface')
            ->add('chambre')
            ->add('couchage')
            ->add('animaux')
            ->add('description', TextareaType::class)
            ->add('image')
            ->add('tarifAnimaux')
            ->add('tarifBasseSaison')
            ->add('tarifHauteSaison')
            ->add('ville')
            ->add('codePostal');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gite::class,
        ]);
    }
}
