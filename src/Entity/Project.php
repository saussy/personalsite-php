<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="project")
 **/
class Project
{
    use \Traits\ToArrayTrait;

    /**
     * @ORM\Id
     * @ORM\Column(name="project_id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     protected $project_id;
     
    /**
     * @ORM\Column(type="string", length=255)
     */
     protected $project_title;

     /**
     * @ORM\Column(type="string", length=255)
     */
     protected $project_category;     

     /**
     * Get the title
     *
     * @ORM\return string
     */
    public function getTitle()
    {
        return $this->project_title;
    }

    /**
     * Get the title
     *
     * @ORM\return string
     */
     public function getCategory()
     {
         return $this->project_category;
     }
}