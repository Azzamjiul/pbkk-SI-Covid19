<?php

namespace KCV\Dashboard\Core\Domain\Model;

class District
{
	private string $id;

	private string $name;

	private string $regencyId;

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

	public function getRegencyId()
	{
		return $this->regencyId;
	}
}