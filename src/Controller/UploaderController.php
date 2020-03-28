<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UploaderController{
    /**
     * @Route("/home")
     */
    public function homeUpload(){
        
        return new Response('Home!');

    }

    /**
     * @Route("/az")
     */
    public function azUpload(){

        return new Response('az!');

    }

    /**
     * @Route("/ionos_bg")
     */
    public function ionos_bgUpload(){

        return new Response('ionos.bg');

    }

    /**
     * @Route("/ionos_ro")
     */
    public function ionos_roUpload(){

        return new Response('ionos.ro');

    }

    /**
     * @Route("/ionos_hu")
     */
    public function ionos_huUpload(){

        return new Response('ionos.hu');

    }

}
