<?php

namespace ZD\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Content
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Content
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;
    
    /**
    * @ORM\ManyToOne(targetEntity="ZD\AdminBundle\Entity\Day", inversedBy="Contents")
    * @ORM\JoinColumn(nullable=false)
    */
     private $day;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Content
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set day
     *
     * @param \ZD\AdminBundle\Entity\Day $day
     *
     * @return Content
     */
    public function setDay(\ZD\AdminBundle\Entity\Day $day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return \ZD\AdminBundle\Entity\Day
     */
    public function getDay()
    {
        return $this->day;
    }
}
