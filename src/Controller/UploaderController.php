<?php

namespace App\Controller;

use App\Form\FormUploaderType;
use App\Entity\FormUploader;
use Gedmo\Sluggable\Util\Urlizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UploaderController extends AbstractController {

    /**
     * @Route("/", name="upload_terms")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function site(Request $request){
        /** @var UploadedFile $uploadedFile */
        $formUploader = new FormUploader();
        $form = $this->createForm(FormUploaderType::class, $formUploader);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $uploadedFile = $request->files->get('form_uploader');
            $uploadedFile = array_pop($uploadedFile);

            $destination = $this->getParameter('kernel.project_dir').'/public/uploads';

            $originalFileName = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);

            $newFileName = Urlizer::urlize($originalFileName).'.'.$uploadedFile->guessExtension();

            $newFileName = preg_replace('/(\D?\d+\D?\d+\D?\d+)/', '', $newFileName);

            $uploadedFile->move(
                $destination,
                $newFileName
            );

        }

        return $this->render('uploader/upload.html.twig', [
            'createForm' => $form->createView()
        ]);
    }
}
