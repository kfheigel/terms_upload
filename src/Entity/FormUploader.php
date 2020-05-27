<?php

namespace App\Entity;

class FormUploader
{

    private $terms;

    private $service;

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
