<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
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
		// your own logic
	}

	/**
	 * @var string
	 * @ORM\Column(name="first_name",type="string",length=20,columnDefinition="AFTER `id`")
	 */
	protected $firstName;
	/**
	 * @ORM\Column(type="string")
	 */
	protected $lastName;

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