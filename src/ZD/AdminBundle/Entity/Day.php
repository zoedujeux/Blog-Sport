<?php

namespace ZD\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Day
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ZD\AdminBundle\Entity\DayRepository")
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
     * @ORM\Column(name="H3", type="string", length=255)
     * @ORM\OneToMany(targetEntity="ZD\AdminBundle\Entity\H3", mappedBy="day")
    */
    private $H3s;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255)
     * @ORM\OneToMany(targetEntity="ZD\AdminBundle\\Entity\Content", mappedBy="day")
     */
    private $contents;
    
    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="ZD\AdminBundle\Entity\Image", mappedBy="day", cascade={"persist"})
     */
    private $images;
    
    public function __construct()
    {
      $this->H3s = new ArrayCollection();
      $this->contents = new ArrayCollection();
      $this->images = new ArrayCollection();
    }

    // Notez le singulier, on ajoute un seul h3 à la fois
    public function addH3(H3 $H3)
    {
      // Ici, on utilise l'ArrayCollection vraiment comme un tableau
      $this->H3s[] = $H3;

      return $this;
    }

    public function removeH3(H3 $H3)
    {
      // Ici on utilise une méthode de l'ArrayCollection, pour supprimer le h3 en argument
      $this->H3s->removeElement($H3);
    }

    // Notez le pluriel, on récupère une liste de h3 ici !
    public function getH3s()
    {
      return $this->H3s;
    }
    
    
    public function addContent(Content $content)
    {
      
      $this->contents[] = $content;

      return $this;
    }

    public function removeContent(Content $content)
    {
      
      $this->contents->removeElement($content);
    }

    
    public function getContents()
    {
      return $this->contents;
    }
    
    
    public function addImage(Image $image)
    {
      
      $this->images[] = $image;

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
    
      public function setImage(Image $image = null)
    {
      $this->image = $image;
      return $this;
    }


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
//     * Set H3
//     *
//     * @param string $H3
//     *
//     * @return Day
//     */
//    public function setH3($H3)
//    {
//        $this->H3 = $H3;
//
//        return $this;
//    }
//
//    /**
//     * Get H3
//     *
//     * @return string
//     */
//    public function getH3()
//    {
//        return $this->H3;
//    }
//
//    /**
//     * Set content
//     *
//     * @param string $content
//     *
//     * @return Day
//     */
//    public function setContent($content)
//    {
//        $this->content = $content;
//
//        return $this;
//    }
//
//    /**
//     * Get content
//     *
//     * @return string
//     */
//    public function getContent()
//    {
//        return $this->content;
//    }
//
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
}
