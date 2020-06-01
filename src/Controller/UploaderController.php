<?php

namespace HomePL\TermUploader\Controller;

use HomePL\TermUploader\ConfigVendors;
use HomePL\TermUploader\Entity\FormUploader;
use HomePL\TermUploader\FileNameGenerator;
use HomePL\TermUploader\Form\FormUploaderType;
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
     * @param Request $request
     * @param TranslatorInterface $translator
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function formRender(Request $request, TranslatorInterface $translator)
    {
        /** @var UploadedFile $uploadedFile */
        $formUploader = new FormUploader();
        $form = $this->createForm(FormUploaderType::class, $formUploader);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->termUpload($request, $translator);

            return $this->redirectToRoute('upload_terms');
        }

        return $this->render('uploader/upload.html.twig', [
            'createForm' => $form->createView(),
        ]);
    }

    public function termUpload(object $request, object $translator)
    {
        $catalog = $request->request->get('form_uploader')['service'];
        $fileNameGenerator = new FileNameGenerator($request, $catalog);

        if (!$fileNameGenerator->something()->gitlabUpload()) {
            $this->addFlash('danger', $translator->trans('uploadTermsError'));
        } else {
            $url = $fileNameGenerator->getUrl($this->configVendors->vendorUrl($catalog));
            $this->addFlash('success', $translator->trans('uploadTermsSuccess'));
            $this->addFlash('info', $url.'<br><a href="'.$url.'" target="_blank">Podgląd</a> <br><br> Plik będzie dostępny po kilku minutach, proszę o cierpliwość!');
        }
    }
}
