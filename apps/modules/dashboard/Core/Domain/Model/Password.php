<?php

namespace Kun\Dashboard\Core\Domain\Model;

class Password 
{
	/**
	 * @var string
	 */
	private $hashedPassword;

	public function __construct($hashedPassword)
	{
		$this->hashedPassword = $hashedPassword;
	}

	public function toString()
	{
		return $this->hashedPassword;
	}

	public function isCorrect(string $password) : bool
	{
		return password_verify($password, $this->hashedPassword);
	}
}