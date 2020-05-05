<?php

namespace KCV\Dashboard\Core\Domain\Model;

class Province
{
	private string $id;

	private string $name;

	public function __construct($id, $name)
	{
		$this->id = $id;
		$this->name = $name;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}
}