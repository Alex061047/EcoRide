<?php

namespace App\Form;

use App\Document\Itineraire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItineraireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('depart', TextType::class, [
                'label' => 'Ville de départ'
            ])
            ->add('arrive', TextType::class, [
                'label' => 'Ville d\'arrivée'
            ])
            ->add('jour', DateType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Jour',
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Rechercher'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Itineraire::class,
        ]);
    }
}