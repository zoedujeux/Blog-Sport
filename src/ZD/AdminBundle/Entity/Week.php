<?php

namespace ZD\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Week
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ZD\AdminBundle\Entity\WeekRepository")
 */
class Week
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="ZD\AdminBundle\Entity\Day", mappedBy="week")
     */
    private $days;


    public function __construct()
    {
      $this->days = new ArrayCollection();
    }

    public function addDay(Day $day)
    {
      $this->days[] = $day;
      
      $day->setWeek($this);

      return $this;
    }

    public function removeDay(Day $day)
    {
      $this->days->removeElement($day);
    }

    public function getDays()
    {
      return $this->days;
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
     * Set title
     *
     * @param string $title
     *
     * @return Week
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }


}

