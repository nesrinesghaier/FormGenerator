<?php
/**
 * Created by PhpStorm.
 * User: Nesrine
 * Date: 29/08/2018
 * Time: 15:15
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use AppBundle\Entity\Form;
use AppBundle\Entity\User;


/**
 * @ORM\Entity
 * @ORM\Table(name="response")
 */
class Response
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="content",type="string")
     */
    protected $content;


    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User",cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",nullable=false)
     */
    protected $user;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Question",cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id",nullable=false)
     */
    protected $question;

    /**
     * Response constructor.
     * @param $user_id
     * @param string $content
     * @param $user
     * @param $question
     */
    public function __construct($content,$user, $question)
    {
        $this->content = $content;
        $this->user = $user;
        $this->question = $question;
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

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }


    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


}