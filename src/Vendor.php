<?php

declare(strict_types=1);

namespace HomePL\TermUploader;

class Vendor
{
    public array $config;

    public function __construct(array $configVendor)
    {
        $this->config = $configVendor;
    }

    public function getAll(): array
    {
        return $this->config;
    }

    public function getServiceName(): string
    {
        return $this->config['serviceName'];
    }

    public function getBaseUrl(): string
    {
        return $this->config['baseUrl'];
    }

    public function getCatalog(): string
    {
        return $this->config['catalog'];
    }

    public function getUserRole(): string
    {
        return $this->config['userRole'];
    }
}
