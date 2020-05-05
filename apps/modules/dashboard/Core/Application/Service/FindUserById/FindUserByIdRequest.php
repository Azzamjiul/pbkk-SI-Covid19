<?php

namespace KCV\Dashboard\Core\Application\Service\FindUserById;

class FindUserByIdRequest 
{
	protected string $userId;

	public function __construct(string $userId) 
	{
		$this->userId = $userId;
	}

	public function getUserId() 
	{
		return $this->userId;
	}
}