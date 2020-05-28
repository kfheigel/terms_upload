<?php

namespace App\Form;

use App\Entity\FormUploader;
use App\Service\ConfigVendors;
use App\Validator\Constraints\CorrectFilename;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class FormUploaderType extends AbstractType
{
    public function __construct(ConfigVendors $configVendors)
    {
        $this->configVendors = $configVendors;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('service', ChoiceType::class, [
                'placeholder' => 'Wybierz serwis',
                'choices' => $this->configVendors->loadChoiceList(),
                'mapped' => false,
            ])
            ->add('terms', FileType::class, [
                'constraints' => [
                    new CorrectFilename(),
                    new File([
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Wrzuć plik PDF z poprawnym rozszerzeniem',
                    ]),
                ], ])
            ->add('button', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FormUploader::class,
        ]);
    }
}
