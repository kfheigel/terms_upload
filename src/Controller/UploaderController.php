<?php

namespace HomePL\TermUploader\Controller;

use HomePL\TermUploader\ConfigVendors;
use HomePL\TermUploader\Entity\FormUploader;
use HomePL\TermUploader\FileNameGenerator;
use HomePL\TermUploader\Form\FormUploaderType;
use HomePL\TermUploader\Uploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class UploaderController extends AbstractController
{
    private ConfigVendors $configVendors;

    public function __construct(ConfigVendors $configVendors)
    {
        $this->configVendors = $configVendors;
    }

    /**
     * @Route("/", name="upload_terms")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function formRender(Request $request, TranslatorInterface $translator)
    {
        /** @var UploadedFile $uploadedFile */
        $formUploader = new FormUploader();
        $form = $this->createForm(FormUploaderType::class, $formUploader);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $catalog = $request->request->get('form_uploader')['service'];

            $fileNameGenerator = new FileNameGenerator($request);
            $originalFileName = $fileNameGenerator->getOriginalFilename();
            $tmpPath = $fileNameGenerator->getFilePath();

            $upload = new Uploader($catalog.'/'.$originalFileName, file_get_contents($tmpPath));

            if (!$upload->gitlabUpload()) {
                $this->addFlash('danger', $translator->trans('uploadTermsError'));
            } else {
                $url = $this->configVendors->vendorUrl($catalog).'/'.$catalog.'/'.$originalFileName;
                $this->addFlash('success', $translator->trans('uploadTermsSuccess'));
                $this->addFlash('info', $url.'<br><a href="'.$url.'" target="_blank">Podgląd</a> <br><br> Plik będzie dostępny po kilku minutach, proszę o cierpliwość!');
            }

            return $this->redirectToRoute('upload_terms');
        }

        return $this->render('uploader/upload.html.twig', [
            'createForm' => $form->createView(),
        ]);
    }
}
