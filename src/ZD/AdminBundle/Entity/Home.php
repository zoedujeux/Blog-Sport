<?php

namespace ZD\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Home
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ZD\AdminBundle\Entity\HomeRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Home
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
     * @ORM\Column(name="TitleH1", type="string", length=255,nullable=true)
     * 
     */
    private $titleH1;

    /**
     * @var string
     *
     * @ORM\Column(name="Content", type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="TitleH2", type="string", length=255)
     */
    private $titleH2;


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
     * Set titleH1
     *
     * @param string $titleH1
     *
     * @return Home
     */
    public function setTitleH1($titleH1)
    {
        $this->titleH1 = $titleH1;

        return $this;
    }

    /**
     * Get titleH1
     *
     * @return string
     */
    public function getTitleH1()
    {
        return $this->titleH1;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Home
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
     * Set titleH2
     *
     * @param string $titleH2
     *
     * @return Home
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
}

