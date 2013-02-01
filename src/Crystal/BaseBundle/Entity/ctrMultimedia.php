<?php

namespace Crystal\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ctrMultimedia
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Crystal\BaseBundle\Entity\ctrMultimediaRepository")
 */
class ctrMultimedia
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
     * @ORM\Column(name="path", type="string", length=40)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=15)
     */
    private $type;


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
     * @ORM\ManyToOne(targetEntity="catNews", inversedBy="ctrMultimedia")
     * @ORM\JoinColumn(name="idNew", referencedColumnName="id")
     * @return integer
     */
    private $idNew;

    public function setidNew(\Crystal\BaseBundle\Entity\catNews $idNew)
    {
        $this->idNew = $idNew;
    }

    public function getidNew()
    {
        return $this->idUser;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return ctrMultimedia
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return ctrMultimedia
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
}
