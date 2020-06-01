<?php

namespace HomePL\TermUploader;

use Gedmo\Sluggable\Util\Urlizer;

class FileNameGenerator
{
    public function __construct(object $request, string $catalog)
    {
        $this->request = $request;
        $this->catalog = $catalog;
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

    public function getUrl(string $vendorUrl)
    {
        return $vendorUrl.'/'.$this->catalog.'/'.$this->getOriginalFilename();
    }

    public function something()
    {
        $originalFileName = $this->getOriginalFilename();
        $tmpPath = $this->getFilePath();

        return new Uploader($this->catalog.'/'.$originalFileName, file_get_contents($tmpPath));
    }
}
