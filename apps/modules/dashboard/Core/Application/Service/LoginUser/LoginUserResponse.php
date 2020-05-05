<?php

namespace Kun\Dashboard\Core\Application\Service\LoginUser;

use Kun\Dashboard\Core\Domain\Model\User;

class LoginUserResponse 
{
	protected $data;

	public function __construct($data) 
	{
		$this->data = $data;
	}

	public function getData() : ?User
	{
		return $this->data;
	}
}