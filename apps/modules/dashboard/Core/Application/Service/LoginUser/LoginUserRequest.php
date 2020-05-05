<?php

namespace Kun\Dashboard\Core\Application\Service\LoginUser;

class LoginUserRequest 
{
	/**
	 * @var string
	 */
	protected $keyValue;

	/**
	 * @var string
	 */
	protected $password;

	public function __construct($keyValue, $password) 
	{
		$this->keyValue = $keyValue;
		$this->password = $password;
	}

	public function getKeyValue() 
	{
		return $this->keyValue;
	}

	public function getPassword()
	{
		return $this->password;
	}
}