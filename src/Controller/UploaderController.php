<?php

namespace App\Controller;

use App\Entity\FormUploader;
use App\Form\FormUploaderType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UploaderController extends AbstractController {

    /**
     * @Route("/", name="uploader_service")
     */
    public function site(){

        $form = $this->createForm(FormUploaderType::class, null);

        return $this->render('uploader/upload.html.twig', [
            'create_form' => $form->createView()
        ]);
    }

    /**
     * @Route("/", name="upload_terms")
     */
    public function termUpload(Request $request){
        /** @var UploadedFile $uploadedFile */
        $uploadedFile = $request->files->get('terms');
        $destination = $this->getParameter('kernel.project_dir').'/public/uploads';

        $uploadedFile->move($destination);
    }
}
