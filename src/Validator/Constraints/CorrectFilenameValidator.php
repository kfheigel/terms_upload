<?php

namespace App\Validator\Constraints;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class CorrectFilenameValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }

        new Callback(function (UploadedFile $object, ExecutionContextInterface $context, Constraint $constraint) {
            $pattern = '/^([a-z]+-)+20\d{6}\.pdf/';
            if (!preg_match($pattern, $object->getClientOriginalName())) {
                $context->buildViolation($constraint->message)
                    ->addViolation();
            }
        });
    }
}
