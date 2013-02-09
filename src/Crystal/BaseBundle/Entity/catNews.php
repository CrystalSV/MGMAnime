<?php

namespace Crystal\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * catNews
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Crystal\BaseBundle\Entity\catNewsRepository")
 */
class catNews
{
     public function __construct()
    {
        $this->idMultimedia = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @ORM\Column(name="Title", type="string", length=90)
     */
    private $Title;
    
    /**
     * @ORM\ManyToOne(targetEntity="catCategories", inversedBy="catNews")
     * @ORM\JoinColumn(name="idCategory", referencedColumnName="id")
     * @return integer
     */
    private $idCategory;

    public function setidCategory(\Crystal\BaseBundle\Entity\catCategories $idCategory)
    {
        $this->idCategory = $idCategory;
    }

    public function getidCategory()
    {
        return $this->idCategory;
    }
     /**
     * @ORM\ManyToOne(targetEntity="catUsers", inversedBy="catNews")
     * @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     * @return integer
     */
    private $idUser;

    public function setidUser(\Crystal\BaseBundle\Entity\catUsers $idUser)
    {
        $this->idUser = $idUser;
    }

    public function getidUser()
    {
        return $this->idUser;
    }

    /**
     * @ORM\OneToMany(targetEntity="ctrMultimedia", mappedBy="idNew")
     */
    private $idMultimedia;

    public function addidMultimedia(\Crystal\BaseBundle\Entity\ctrMultimedia $idMultimedia)
    {
        $this->idMultimedia[] = $idMultimedia;
    }

    public function getidMultimedia()
    {
        return $this->idMultimedia;
    }    

    /**
     * @var string
     *
     * @ORM\Column(name="Content", type="text")
     */
    private $Content;

    /**
     * @var string
     *
     * @ORM\Column(name="Date", type="string", length=10)
     */
    private $Date;

    /**
     * @var string
     *
     * @ORM\Column(name="Keywords", type="string", length=255)
     */
    private $Keywords;


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
     * Set Title
     *
     * @param string $title
     * @return catNews
     */
    public function setTitle($title)
    {
        $this->Title = $title;
    
        return $this;
    }

    /**
     * Get Title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * Set Content
     *
     * @param string $content
     * @return catNews
     */
    public function setContent($content)
    {
        $this->Content = $content;
    
        return $this;
    }

    /**
     * Get Content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->Content;
    }

    /**
     * Set Date
     *
     * @param string $date
     * @return catNews
     */
    public function setDate($date)
    {
        $this->Date = $date;
    
        return $this;
    }

    /**
     * Get Date
     *
     * @return string 
     */
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * Set Keywords
     *
     * @param string $keywords
     * @return catNews
     */
    public function setKeywords($keywords)
    {
        $this->Keywords = $keywords;
    
        return $this;
    }

    /**
     * Get Keywords
     *
     * @return string 
     */
    public function getKeywords()
    {
        return $this->Keywords;
    }
}
