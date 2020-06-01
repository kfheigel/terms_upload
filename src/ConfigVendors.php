<?php

namespace HomePL\TermUploader;

class ConfigVendors
{
    public function __construct(array $vendors)
    {
        $this->vendors = $vendors;

        foreach ($this->vendors as $vendorName => $vendorConfig) {
            $this->vendors[$vendorName] = new Vendor($vendorConfig);
        }
    }

    public function loadChoiceList()
    {
        $choices = [];

        foreach ($this->vendors as $service) {
            foreach ($service as $key => $value) {
                $choices[$service->getServiceName()] = $service->getCatalog();
            }
        }

        return $choices;
    }

    public function vendorUrl(string $catalog)
    {
        foreach ($this->vendors as $service) {
            if (in_array($catalog, $service->getAll())) {
                return $service->getBaseUrl();
            }
        }
    }
}
