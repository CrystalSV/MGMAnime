<?php

namespace Crystal\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * catCategories
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Crystal\BaseBundle\Entity\catCategoriesRepository")
 */
class catCategories
{
     public function __construct()
    {
        $this->idCategory = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @ORM\Column(name="Name", type="string", length=70)
     */
    private $Name;


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
     * @ORM\OneToMany(targetEntity="catNews", mappedBy="idCategory")
     */
    private $idCategory;

    public function addidCategory(\Crystal\BaseBundle\Entity\catCategories $idCategory)
    {
        $this->idCategory[] = $idCategory;
    }

    public function getidCategory()
    {
        return $this->idCategory;
    }

    /**
     * Set Name
     *
     * @param string $name
     * @return catCategories
     */
    public function setName($name)
    {
        $this->Name = $name;
    
        return $this;
    }

    /**
     * Get Name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->Name;
    }
}
