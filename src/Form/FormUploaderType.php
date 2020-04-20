<?php

namespace App\Form;

use App\Entity\FormUploader;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
                'mapped'        => false,
                'required'      => false,
            ])
            ->add('terms', FileType::class,[
                'attr' => [
                    'name' => 'name',
                ]
            ])
            ->add('button', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FormUploader::class,
        ]);
    }
}
