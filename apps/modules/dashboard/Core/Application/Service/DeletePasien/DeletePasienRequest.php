<?php

namespace KCV\Dashboard\Core\Application\Service\DeletePasien;

class DeletePasienRequest
{
	protected string $id;

	public function __construct($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}
}