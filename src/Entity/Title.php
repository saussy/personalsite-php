<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="title")
 **/
class Title
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     protected $id;
     
    /**
     * @ORM\Column(type="string", length=255)
     */
     protected $title;

     /**
     * Get the title
     *
     * @ORM\return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}