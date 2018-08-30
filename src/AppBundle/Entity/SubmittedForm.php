<?php
/**
 * Created by PhpStorm.
 * User: Nesrine
 * Date: 30/08/2018
 * Time: 10:34
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use AppBundle\Entity\User;

/**
 * @ORM\Entity
 * @ORM\Table(name="submittedForm")
 */
class SubmittedForm
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Form",cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="form_id", referencedColumnName="id",nullable=false)
     */
    protected $form;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User",cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",nullable=false)
     */
    protected $user;

    /**
     * submittedForm constructor.
     * @param $form
     * @param $user
     * @param string $submitted
     */
    public function __construct($form, $user, $submitted)
    {
        $this->form = $form;
        $this->user = $user;
        $this->submitted = $submitted;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @param mixed $form
     */
    public function setForm($form)
    {
        $this->form = $form;
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
     * @return string
     */
    public function getSubmitted()
    {
        return $this->submitted;
    }

    /**
     * @param string $submitted
     */
    public function setSubmitted($submitted)
    {
        $this->submitted = $submitted;
    }


    /**
     * @var string
     * @ORM\Column(name="submitted",type="string")
     */
    protected $submitted;

}