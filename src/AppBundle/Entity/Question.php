<?php
/**
 * Created by PhpStorm.
 * User: Nesrine
 * Date: 23/08/2018
 * Time: 11:16
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;

/**
 * @ORM\Entity
 * @ORM\Table(name="question")
 */
class Question
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="title",type="string",length=50)
     */
    protected $title;

    /**
     * @var string
     * @ORM\Column(name="obligation",type="string",length=5)
     */
    protected $obligation;

    /**
     * @var string
     * @ORM\Column(name="questionType",type="string")
     */
    protected $questionType;

    /**
     * @var array
     * @ORM\Column(name="items",type="array")
     */
    protected $items;

    /**
     * @return array
     */
    public function getItems()
    {
        if($this->items===null){
            return "";
        }
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Form",inversedBy="questions",cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="form_id", referencedColumnName="id",nullable=false)
     */
    protected $form;

    /**
     * Question constructor.
     * @param string $title
     * @param string $obligation
     * @param string $questionType
     * @param string $items
     * @param $form
     */
    public function __construct($title, $obligation, $questionType)
    {
        $this->title = $title;
        $this->obligation = $obligation;
        $this->questionType = $questionType;
        $this->items = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
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
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getObligation()
    {
        return $this->obligation;
    }

    /**
     * @param string $obligation
     */
    public function setObligation($obligation)
    {
        $this->obligation = $obligation;
    }

    /**
     * @return string
     */
    public function getQuestionType()
    {
        return $this->questionType;
    }

    /**
     * @param string $questionType
     */
    public function setQuestionType($questionType)
    {
        $this->questionType = $questionType;
    }


}