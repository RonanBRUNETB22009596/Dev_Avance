<?php

namespace App\Form;

use App\Entity\Flag;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FlagType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('choices', ChoiceType::class, [
                'choices' => $options['flag_choices'],
                'multiple' => false,
                'expanded' => true, // Display as radio buttons
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Flag::class,
            'flag_choices' => [], // Passing flag choices dynamically
        ]);
    }
}