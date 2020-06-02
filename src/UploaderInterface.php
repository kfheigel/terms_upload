<?php

declare(strict_types=1);

namespace HomePL\TermUploader;

interface UploaderInterface
{
    public function upload(): bool;
}
