<?php

namespace KCV\Dashboard\Core\Application\Service\EditPoster;

class EditPosterRequest
{
	private $id;

	private string $name;

	private string $path;

	public function __construct($id, $name, $path)
	{
		$this->id = $id;
		$this->name = $name;
		$this->path = $path;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getPath()
	{
		return $this->path;
	}
}