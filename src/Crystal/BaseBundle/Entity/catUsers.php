<?php

namespace Crystal\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * catUsers
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Crystal\BaseBundle\Entity\catUsersRepository")
 */
class catUsers
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
     * @ORM\Column(name="userName", type="string", length=50)
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=80)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="pass", type="string", length=20)
     */
    private $pass;

    /**
     * @var string
     *
     * @ORM\Column(name="signature", type="text")
     */
    private $signature;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=1)
     */
    private $gender;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="Ocupations", type="text")
     */
    private $Ocupations;

    /**
     * @var string
     *
     * @ORM\Column(name="hobbies", type="text")
     */
    private $hobbies;

    /**
     * @var string
     *
     * @ORM\Column(name="birthday", type="string", length=10)
     */
    private $birthday;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=80)
     */
    private $website;


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
     * @ORM\OneToMany(targetEntity="catNews", mappedBy="idUser")
     */
    private $idUser;

    public function addidUser(\Crystal\BaseBundle\Entity\catUsers $idUser)
    {
        $this->idUser[] = $idUser;
    }

    public function getidUser()
    {
        return $this->idUser;
    }

     /**
     *ORM\@OneToOne(targetEntity="ctrAvatars", inversedBy="catUsers")
     * ORM\@JoinColumn(name="idAvatar", referencedColumnName="id")
     **/
    private $idAvatar;

   public function setidAvatar(\Crystal\BaseBundle\Entity\ctrAvatars $idAvatar)
    {
        $this->idAvatar = $idAvatar;
    }

    public function getidAvatar()
    {
        return $this->idAvatar;
    }


    /**
     * Set userName
     *
     * @param string $userName
     * @return catUsers
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    
        return $this;
    }

    /**
     * Get userName
     *
     * @return string 
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return catUsers
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    
        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set pass
     *
     * @param string $pass
     * @return catUsers
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    
        return $this;
    }

    /**
     * Get pass
     *
     * @return string 
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set signature
     *
     * @param string $signature
     * @return catUsers
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    
        return $this;
    }

    /**
     * Get signature
     *
     * @return string 
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return catUsers
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    
        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return catUsers
     */
    public function setAge($age)
    {
        $this->age = $age;
    
        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set Ocupations
     *
     * @param string $ocupations
     * @return catUsers
     */
    public function setOcupations($ocupations)
    {
        $this->Ocupations = $ocupations;
    
        return $this;
    }

    /**
     * Get Ocupations
     *
     * @return string 
     */
    public function getOcupations()
    {
        return $this->Ocupations;
    }

    /**
     * Set hobbies
     *
     * @param string $hobbies
     * @return catUsers
     */
    public function setHobbies($hobbies)
    {
        $this->hobbies = $hobbies;
    
        return $this;
    }

    /**
     * Get hobbies
     *
     * @return string 
     */
    public function getHobbies()
    {
        return $this->hobbies;
    }

    /**
     * Set birthday
     *
     * @param string $birthday
     * @return catUsers
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    
        return $this;
    }

    /**
     * Get birthday
     *
     * @return string 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return catUsers
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    
        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }
}
