<?php

namespace ZD\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ZD\BlogBundle\Entity\ArticleRepository")
 */
class Article
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
     * @ORM\Column(name="titleH3", type="string", length=255)
     */
    private $titleH3;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;


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
     * @return Article
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
     * @return Article
     */
    public function setTitleH3($titleH3)
    {
        $this->titleH3 = $titleH3;

        return $this;
    }

    /**
     * Get titleH3
     *
     * @return string
     */
    public function getTitleH3()
    {
        return $this->titleH3;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Article
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
}

