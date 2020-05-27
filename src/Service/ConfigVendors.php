<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class ConfigVendors
{
    public function __construct(ContainerBagInterface $containerBag)
    {
        $this->containerBag = $containerBag->get('vendors');
    }

    public function loadChoiceList()
    {
        $choices = [];

        foreach ($this->containerBag as $service) {
            foreach ($service as $key => $value) {
                $choices[$service['serviceName']] = $service['catalog'];
            }
        }

        return $choices;
    }

    public function vendorUrl($catalog)
    {
        foreach ($this->containerBag as $service) {
            if (in_array($catalog, $service)) {
                return $service['baseUrl'];
            }
        }
    }
}
