<?php

namespace Kun\Dashboard\Core\Domain\Model;

use Ramsey\Uuid\Uuid;

class PasienId
{
	private string $id;

	public function __construct($id = null)
	{
		$this->id = $id ? : Uuid::uuid4()->toString();
	}

	public function id() 
	{
		return $this->id;
	}

	public function isEqual(PasienId $pasienId) : bool
	{
		return $this->id === $pasienId->id;
	}

}