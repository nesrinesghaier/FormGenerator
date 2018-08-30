<?php
/**
 * Created by PhpStorm.
 * User: Nesrine
 * Date: 27/07/2018
 * Time: 13:55
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="form")
 */
class Form
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\Column(type="string",name="title")
     */
    private $title;
    /**
     * @ORM\Column(type="string",name="formDescription", nullable=true)
     */
    private $formDescription;
    /**
     * @ORM\Column(type="datetime",name="creationDate")
     * @Assert\DateTime
     */
    private $creationDate;
    /**
     * @ORM\Column(type="datetime",name="lastModifDate", nullable=true)
     * @Assert\Type("\DateTime")
     */
    private $lastModifDate;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Question",mappedBy="form", cascade={"persist", "remove"})
     */
    protected $questions;

    /**
     * @return mixed
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * @param mixed $questions
     */
    public function setQuestions($questions)
    {
        $this->questions= $questions;
    }



    /**
     * Form constructor.
     * @param $id
     * @param $title
     * @param $formDescription
     * @param $creationDate
     * @param $lastModifDate
     */

    public function __construct($title, $formDescription, $creationDate)
    {
        $this->title = $title;
        $this->formDescription = $formDescription;
        $this->creationDate = $creationDate;
        $this->questions = new ArrayCollection();

    }

    /**
     * @return mixed
     */

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getFormDescription()
    {
        return $this->formDescription;
    }

    /**
     * @param mixed $formDescription
     */
    public function setFormDescription($formDescription)
    {
        $this->formDescription = $formDescription;
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param mixed $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return mixed
     */
    public function getLastModifDate()
    {
        return $this->lastModifDate;
    }

    /**
     * @param mixed $lastModifDate
     */
    public function setLastModifDate($lastModifDate)
    {
        $this->lastModifDate = $lastModifDate;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

}