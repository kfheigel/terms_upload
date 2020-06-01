<?php

declare(strict_types=1);

namespace HomePL\TermUploader;

class Vendor
{
    public function __construct(array $configVendor)
    {
        $this->config = $configVendor;
    }

    public function getAll()
    {
        return $this->config;
    }

    public function getServiceName()
    {
        return $this->config['serviceName'];
    }

    public function getBaseUrl()
    {
        return $this->config['baseUrl'];
    }

    public function getCatalog()
    {
        return $this->config['catalog'];
    }

    public function getUserRole()
    {
        return $this->config['userRole'];
    }
}
