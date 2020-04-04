<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UploaderController extends AbstractController {

    /**
     * @Route("/", name="uploader_service")
     */
    public function site(){
        return $this->render('uploader/upload.html.twig');
    }

    /**
     * @Route("/", name="upload_terms")
     */
    public function termUpload(Request $request){
        dd($request->files->get('terms'));
    }
}
