<?php

namespace Kun\Dashboard\Core\Domain\Model;

class Regency
{
	private string $id;

	private string $name;

	private string $provinceId;

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

	public function getProvinceId()
	{
		return $this->provinceId;
	}
}