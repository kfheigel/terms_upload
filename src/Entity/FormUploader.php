<?php

declare(strict_types=1);

namespace HomePL\TermUploader\Entity;

class FormUploader
{
    private $terms;

    private $service;

    private $vendor;

    public function getVendor()
    {
        return $this->vendor;
    }

    public function setVendor($vendor): void
    {
        $this->vendor = $vendor;
    }

    public function getService(): ?string
    {
        return $this->service;
    }

    public function setService($service): self
    {
        $this->service = $service;
    }

    public function getTerms(): ?string
    {
        return $this->terms;
    }

    public function setTerms(string $terms): self
    {
        $this->terms = $terms;

        return $this;
    }
}
