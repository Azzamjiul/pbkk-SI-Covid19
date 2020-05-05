<?php

namespace KCV\Dashboard\Core\Application\Service\EditCekKesehatan;

class EditCekKesehatanRequest
{
	private string $id;

	private string $hasil;

	private int $isChecked;

	public function __construct($id, $hasil, $isChecked)
	{
		$this->hasil = $hasil;
		$this->id = $id;
		$this->isChecked = $isChecked;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getHasil()
	{
		return $this->hasil;
	}

	public function getIsChecked()
	{
		return $this->isChecked;
	}
}