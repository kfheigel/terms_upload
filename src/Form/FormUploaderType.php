<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormUploaderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('service', ChoiceType::class, [
                'choices'       => [
                    'home'      => 'home',
                    'az'        => 'az',
                    'ionos.bg'  => 'ionosbg',
                    'ionos.ro'  => 'ionosro',
                    'ionos.hu'  => 'ionoshu',
                    ],
                'attr'          =>[
                    'class'     => ''
                    ],
            ])
            ->add('date', DateType::class)
            ->add('fileName', TextType::class)
            ->add('fileLink', TextType::class)
            ->add('terms', FileType::class)
            ->add('button', SubmitType::class, [
                'attr'          =>[
                    'class'     => 'btn btn-secondary',
                ],
                ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FormUploaderType::class,
        ]);
    }
}
