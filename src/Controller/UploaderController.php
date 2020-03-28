<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UploaderController{

    /**
     * @Route("/uploader/{service}")
     */
    public function Upload($service){

        $services = array('home', 'az', 'ionosbg', 'ionoshu', 'ionosro');
        if(in_array($service, $services)){
            return new Response(sprintf(
                'Active service: "%s"',
                $service
            ));
        }else {
            return new Response(sprintf(
                'Service: "%s" is not available',
                $service
            ));
        }
    }
}
