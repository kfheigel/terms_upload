<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class CorrectFilename extends Constraint
{
    public string $message = 'Nazwa pliku lub rozszerzenie jest nieprawidłowe. Zmień nazwę zgodnie z wytycznymi poniżej:';

//    public function validatedBy()
//    {
//        return 'CorrectFilenameValidator';
//    }
}
