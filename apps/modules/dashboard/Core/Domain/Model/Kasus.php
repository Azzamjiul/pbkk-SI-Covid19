<?php

namespace KCV\Dashboard\Core\Domain\Model;

class Kasus
{
	private string $nama;

	private int $jumlah;

	private $waktu;

	public function __construct($nama, $jumlah, $waktu)
	{
		$this->nama = $nama;
		$this->jumlah = $jumlah;
		$this->waktu = $waktu;
	}

	public function getNama()
	{
		return $this->nama;
	}

	public function getJumlah()
	{
		return $this->jumlah;
	}

	public function getWaktu()
	{
		return $this->waktu;
	}

	public function getDateOnly()
	{
		$dt = new \DateTime($this->waktu);
		$date = $dt->format('d-M');

		return $date;
	}
}