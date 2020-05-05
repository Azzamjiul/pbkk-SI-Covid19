<?php

namespace KCV\Dashboard\Core\Application\Service\FindPasienById;

class FindPasienByIdRequest 
{
	protected string $pasienId;

	public function __construct(string $pasienId) 
	{
		$this->pasienId = $pasienId;
	}

	public function getPasienId() 
	{
		return $this->pasienId;
	}
}