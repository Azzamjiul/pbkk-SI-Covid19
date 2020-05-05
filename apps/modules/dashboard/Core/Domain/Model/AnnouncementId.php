<?php

namespace KCV\Dashboard\Core\Domain\Model;

use Ramsey\Uuid\Uuid;

class AnnouncementId
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

	public function isEqual(AnnouncementId $announcementId) : bool
	{
		return $this->id === $announcementId->id;
	}

}