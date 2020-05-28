<?php

namespace HomePL\TermUploader;

use Gedmo\Sluggable\Util\Urlizer;

class FileNameGenerator
{
    public function __construct($request)
    {
        $this->request = $request;
    }

    public function getUploadedFile()
    {
        $uploadedFile = $this->request->files->get('form_uploader');
        $uploadedFile = array_pop($uploadedFile);

        return $uploadedFile;
    }

    public function getOriginalFilename()
    {
        $uploadedFile = $this->getUploadedFile();
        $originalFileName = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $originalFileName = Urlizer::urlize($originalFileName).'.'.$uploadedFile->guessExtension();

        return $originalFileName;
    }

    public function getFilePath()
    {
        return $this->getUploadedFile()->getPathname();
    }
}
