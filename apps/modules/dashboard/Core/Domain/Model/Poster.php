<?php

namespace KCV\Dashboard\Core\Domain\Model;

class Poster
{
	private $id;

	private string $name;

	private string $path;

	private $timestamp;

	public function __construct($name, $path, $timestamp = NULL, $id = NULL)
	{
		$this->id = $id;
		$this->name = $name;
		$this->path = $path;
		$this->timestamp = $timestamp;
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

	public function getTimestamp()
	{
		return $this->timestamp;
	}
}