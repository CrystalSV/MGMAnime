<?php

namespace Crystal\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ctrAccess
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Crystal\BaseBundle\Entity\ctrAccessRepository")
 */
class ctrAccess
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

     /**
     *ORM\@OneToOne(targetEntity="catUsers", inversedBy="ctrAccess")
     * ORM\@JoinColumn(name="idUser", referencedColumnName="id")
     **/
    private $idUser;
}
