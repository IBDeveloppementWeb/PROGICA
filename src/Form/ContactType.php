<?php

namespace App\Form;

use App\Entity\Contact;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom', TextType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Entrer votre prénom'
                ]
            ])
            ->add('nom', TextType::class, [
                'required' => false,
                'label' => false,

                'attr' => [
                    'placeholder' => 'Entrer votre nom'
                ]
            ])
            ->add('numTel', TextType::class, [
                'required' => false,
                'label' => false,

                'attr' => [
                    'placeholder' => 'Entrer votre numéro de téléphone'
                ]
            ])
            ->add('email', TextType::class, [
                'required' => false,
                'label' => false,

                'attr' => [
                    'placeholder' => 'Entrer votre email'
                ]
            ])
            ->add('message', TextareaType::class, [
                'required' => false,
                'label' => false,

                'attr' => [
                    'placeholder' => 'Entrer votre message'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
            'csrf_protection' => false
        ]);
    }
}
