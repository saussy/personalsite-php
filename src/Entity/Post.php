<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="post")
 **/
class Post
{
    use \Traits\ToArrayTrait;

    /**
     * @ORM\Id
     * @ORM\Column(name="post_id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     protected $post_id;
     
    /**
     * @ORM\Column(type="string", length=255)
     */
     protected $post_title;

     /**
     * @ORM\Column(type="string", length=255)
     */
     protected $post_category;     

     /**
     * @ORM\Column(type="text")
     */
     protected $post_summary;     
     
     /**
     * @ORM\Column(type="text")
     */
     protected $post_body;     
     
     /**
     * Get the title
     *
     * @ORM\return string
     */
    public function getTitle()
    {
        return $this->post_title;
    }

    /**
     * Get the title
     *
     * @ORM\return string
     */
     public function getCategory()
     {
         return $this->post_category;
     }

     /**
     * Get the summary
     *
     * @ORM\return text
     */
     public function getSummary()
     {
         return $this->post_category;
     }

     /**
     * Get the body
     *
     * @ORM\return text
     */
     public function getBody()
     {
         return $this->post_category;
     }
}