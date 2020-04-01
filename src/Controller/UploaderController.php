<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UploaderController extends AbstractController {

    /**
     * @Route("/uploader/{service}")
     */
    public function Upload($service){

        $services = array('home', 'az', 'ionosbg', 'ionoshu', 'ionosro');

        if(in_array($service, $services)){

            return $this->render('uploader/upload.html.twig',[
                'service' => $service,
                'services' => $services
            ]);

        }else {
            return $this->render('uploader/upload.html.twig',[
                'service' => "Service '$service' is not available",
                    ]);


        }
    }
}
