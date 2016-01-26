<?php

namespace ZD\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Day
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="ZD\AdminBundle\Entity\DayRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Day
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
     * @ORM\Column(name="titleH2", type="string", length=255)
     */
    private $titleH2;


    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;
    
    /**
     * @ORM\OneToMany(targetEntity="ZD\AdminBundle\Entity\Image", mappedBy="day", cascade={"persist"})
     */
    private $images;
    
     /**
    * @ORM\ManyToOne(targetEntity="ZD\AdminBundle\Entity\Week", inversedBy="days")
    * @ORM\JoinColumn(name="week")
    */
   private $week;
    
    public function __construct()
    {
      $this->images = new ArrayCollection();
    }   
    
    
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
    
    
    public function addImage(Image $image)
    {
      
      $this->images[] = $image;
      
      $image->setDay($this);

      return $this;
    }

    public function removeImage(Image $image)
    {
      
      $this->images->removeElement($image);
    }

    
    public function getImages()
    {
      return $this->images;
    }
    
//      public function setImage(Image $image = null)
//    {
//      $this->image = $image;
//      return $this;
//    }


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
     * Set titleH2
     *
     * @param string $titleH2
     *
     * @return Day
     */
    public function setTitleH2($titleH2)
    {
        $this->titleH2 = $titleH2;

        return $this;
    }

    /**
     * Get titleH2
     *
     * @return string
     */
    public function getTitleH2()
    {
        return $this->titleH2;
    }

//    /**
//     * Set image
//     *
//     * @param \ZD\AdminBundle\Entity\Image $image
//     *
//     * @return Day
//     */
//    public function setImage(\ZD\AdminBundle\Entity\Image $image)
//    {
//        $this->image = $image;
//
//        return $this;
//    }
//
//    /**
//     * Get image
//     *
//     * @return \ZD\AdminBundle\Entity\Image
//     */
//    public function getImage()
//    {
//        return $this->image;
//    }

    /**
     * Set week
     *
     * @param \ZD\AdminBundle\Entity\Week $week
     *
     * @return Day
     */
    public function setWeek(\ZD\AdminBundle\Entity\Week $week)
    {
        $this->week = $week;

        return $this;
    }

    /**
     * Get week
     *
     * @return \ZD\AdminBundle\Entity\Week
     */
    public function getWeek()
    {
        return $this->week;
    }
}
