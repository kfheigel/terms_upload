<?php

namespace HomePL\TermUploader\Form;

use HomePL\TermUploader\ConfigVendors;
use HomePL\TermUploader\Entity\FormUploader;
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
                    new Callback(function (UploadedFile $object, ExecutionContextInterface $context) {
                        $pattern = '/^([a-z]+-)+20\d{6}\.pdf/';
                        if (!preg_match($pattern, $object->getClientOriginalName())) {
                            $context->buildViolation('Zmień nazwę pliku zgodnie z wytycznymi poniżej:')
                                ->addViolation();
                        }
                    }),

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
