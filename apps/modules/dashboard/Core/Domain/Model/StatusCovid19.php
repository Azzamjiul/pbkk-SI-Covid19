<?php

namespace Kun\Dashboard\Core\Domain\Model;

class StatusCovid19
{
	private string $id;

	private string $nama;

	private ?string $deskripsi;

	public function __construct($id, $nama, $deskripsi)
	{
		$this->id = $id;
		$this->nama = $nama;
		$this->deskripsi = $deskripsi;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getNama()
	{
		return $this->nama;
	}

	public function getDeskripsi()
	{
		return $this->deskripsi;
	}
}