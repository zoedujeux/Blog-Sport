<?php

namespace ZD\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Image
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
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt;

    
    /**
    * @ORM\ManyToOne(targetEntity="ZD\AdminBundle\Entity\Day")
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
    
    private $file;

    public function getFile()
    {
      return $this->file;
    }

    public function setFile(UploadedFile $file = null)
    {
      $this->file = $file;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Image
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return Image
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Set day
     *
     * @param \ZD\AdminBundle\Entity\Day $day
     *
     * @return Image
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
