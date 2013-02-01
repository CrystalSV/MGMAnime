<?php

namespace Crystal\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ctrBreakingNews
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Crystal\BaseBundle\Entity\ctrBreakingNewsRepository")
 */
class ctrBreakingNews
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
     * @ORM\Column(name="imagePath", type="string", length=40)
     */
    private $imagePath;


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
     *@ORM\OneToOne(targetEntity="catNews")
     *@ORM\JoinColumn(name="idNew", referencedColumnName="id")
     **/
    private $idNew;

    public function setidNew(\Crystal\BaseBundle\Entity\catNews $idNew)
    {
        $this->idNew = $idNew;
    }

    public function getidNew()
    {
        return $this->idNew;
    }

    /**
     * Set imagePath
     *
     * @param string $imagePath
     * @return ctrBreakingNews
     */
    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;
    
        return $this;
    }

    /**
     * Get imagePath
     *
     * @return string 
     */
    public function getImagePath()
    {
        return $this->imagePath;
    }
}
