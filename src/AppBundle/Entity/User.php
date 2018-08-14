<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping\AttributeOverride;
use Doctrine\ORM\Mapping\AttributeOverrides;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping\Column;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 *  @AttributeOverrides({
 *      @AttributeOverride(name="usernameCanonical",
 *          column=@Column(
 *              type     = "string",
 *              length   = 155,
 *          )
 *      ),
 *      @AttributeOverride(name="emailCanonical",
 *          column=@Column(
 *              type     = "string",
 *              length   = 155,
 *          )
 *      ),
 *      @AttributeOverride(name="email",
 *          column=@Column(
 *              type     = "string",
 *              length   = 155,
 *              unique   = true,
 *          )
 *      )
 * })
 * @UniqueEntity(fields={"email"},message="This email is already in use")
 * @UniqueEntity("username",message="This username is already in use")
 */
class User extends BaseUser
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	public function __construct()
	{
		parent::__construct();
        $this->forms = new ArrayCollection();
	}

	/**
	 * @var string
	 * @ORM\Column(name="first_name",type="string",length=20)
	 */
	protected $firstName;
	/**
	 * @ORM\Column(type="string")
	 */
	protected $lastName;

	/**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Form",mappedBy="user")
     */
	protected $forms;
	/**
	 * @return mixed
	 */
	public function getLastName()
	{
		return $this->lastName;
	}
	/**
	 * @param mixed $lastName
	 */
	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
	}
	/**
	 * @return mixed
	 */
	public function getFirstName()
	{
		return $this->firstName;
	}
	/**
	 * @param mixed $firstName
	 */
	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;
	}
}