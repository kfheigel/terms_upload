<?php

namespace HomePL\TermUploader;

class ConfigVendors
{
    public function __construct(array $vendors)
    {
        $this->vendors = $vendors;
    }

    public function loadChoiceList()
    {
        $choices = [];

        foreach ($this->vendors as $service) {
            foreach ($service as $key => $value) {
                $choices[$service['serviceName']] = $service['catalog'];
            }
        }

        return $choices;
    }

    public function vendorUrl($catalog)
    {
        foreach ($this->vendors as $service) {
            if (in_array($catalog, $service)) {
                return $service['baseUrl'];
            }
        }
    }
}
