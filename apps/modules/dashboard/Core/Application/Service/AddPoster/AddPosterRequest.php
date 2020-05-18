<?php

namespace KCV\Dashboard\Core\Application\Service\AddPoster;

class AddPosterRequest
{
	private string $name;

	private string $path;

	public function __construct($name, $path)
	{
		$this->name = $name;
		$this->path = $path;
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