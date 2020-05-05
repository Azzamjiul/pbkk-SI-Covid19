<?php

namespace KCV\Dashboard\Core\Application\Service\LoginUser;

use KCV\Dashboard\Core\Domain\Model\User;

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