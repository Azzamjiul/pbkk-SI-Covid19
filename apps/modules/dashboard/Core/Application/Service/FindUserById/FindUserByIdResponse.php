<?php

namespace KCV\Dashboard\Core\Application\Service\FindUserById;

class FindUserByIdResponse 
{
	protected $data;

	public function __construct($data)
	{
		$this->data = $data;
	}

	public function getData() 
	{
		return $this->data;
	}
}