<?php

namespace ZD\AdminBundle\Entity;

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
     */
    private $H3;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;
    

    private $image;


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

    /**
     * Set titleH3
     *
     * @param string $titleH3
     *
     * @return Day
     */
    public function setH3($H3)
    {
        $this->H3 = $H3;

        return $this;
    }

    /**
     * Get titleH3
     *
     * @return string
     */
    public function getH3()
    {
        return $this->H3;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Day
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
     * Set image
     *
     * @param \ZD\AdminBundle\Entity\Image $image
     *
     * @return Day
     */
    public function setImage(\ZD\AdminBundle\Entity\Image $image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \ZD\AdminBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }
}
