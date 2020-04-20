<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormUploaderRepository")
 */
class FormUploader
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $terms;


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getTerms(): ?string
    {
        return $this->terms;
    }

    public function setTerms(string $terms): self
    {
        $this->terms = $terms;

        return $this;
    }

}
