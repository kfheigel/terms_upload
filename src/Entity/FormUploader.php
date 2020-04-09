<?php

namespace App\Entity;

class FormUploader
{
    protected $service;
    protected $date;
    protected $file_name;
    protected $file_link;
    protected $input_label;


    /**
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param mixed $service
     */
    public function setService($service): void
    {
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->file_name;
    }

    /**
     * @param mixed $file_name
     */
    public function setFileName($file_name): void
    {
        $this->file_name = $file_name;
    }

    /**
     * @return mixed
     */
    public function getFileLink()
    {
        return $this->file_link;
    }

    /**
     * @param mixed $file_link
     */
    public function setFileLink($file_link): void
    {
        $this->file_link = $file_link;
    }

    /**
     * @return mixed
     */
    public function getInputLabel()
    {
        return $this->input_label;
    }

    /**
     * @param mixed $input_label
     */
    public function setInputLabel($input_label): void
    {
        $this->input_label = $input_label;
    }

    /**
     * @return mixed
     */
    public function getFile_link()
    {
        return $this->file_link;
    }

    /**
     * @param mixed $file_link
     */
    public function setFile_link($file_link): void
    {
        $this->file_link = $file_link;
    }

    /**
     * @return mixed
     */
    public function getInput_label()
    {
        return $this->input_label;
    }

    /**
     * @param mixed $input_label
     */
    public function setInput_label($input_label): void
    {
        $this->input_label = $input_label;
    }
}