<?php

namespace App\Form;

use App\Entity\Publication;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;



class PublierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('message',
                TextareaType::class,
                ['attr' => ['placeholder' => "Qu'avez-vous en tête?",
                    'minlength' => 4,
                    'maxlength' => 200],
                    'constraints' => [
                        new NotBlank(message: 'Ce champ est obligatoire'),
                        new Length(
                            min: 4,
                            max: 200,
                            minMessage: 'Il faut au moins {{ limit }} caractères!',
                            maxMessage: 'Il faut au plus {{ limit }} caractères!',
                        ),
                    ],
                ])
            ->add('publier', SubmitType::class, ['label' => 'Feeder !'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Publication::class,
        ]);
    }
}
