<?php

namespace Kun\Dashboard\Core\Domain\Model;

class CekKesehatan
{
	private CekKesehatanId $id;

	private string $userId;

	private int $suhuTubuh;
	
	private int $frekuensiNapas;

	private ?string $gejalaLain;

	private int $isChecked;

	private ?string $hasil;

	private string $timestamp;

	private ?string $riwayatPerjalanan;

	public function __construct(
		$id,
		$userId, 
		$suhuTubuh, 
		$frekuensiNapas,
		$gejalaLain,
		$timestamp,
		$riwayatPerjalanan = null,
		$isChecked = 0,
		$hasil = null
	)
	{
		$this->id = $id;
		$this->userId = $userId;
		$this->suhuTubuh = $suhuTubuh;
		$this->frekuensiNapas = $frekuensiNapas;
		$this->gejalaLain = $gejalaLain;
		$this->timestamp = $timestamp;
		$this->isChecked = $isChecked;
		$this->hasil = $hasil;
		$this->riwayatPerjalanan = $riwayatPerjalanan;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getUserId()
	{
		return $this->userId;
	}

	public function getSuhuTubuh()
	{
		return $this->suhuTubuh;
	}

	public function getFrekuensiNapas()
	{
		return $this->frekuensiNapas;
	}

	public function getGejalaLain()
	{
		return $this->gejalaLain;
	}

	public function getTimestamp()
	{
		return $this->timestamp;
	}

	public function getRiwayatPerjalanan()
	{
		return $this->riwayatPerjalanan;
	}

	public function getIsChecked()
	{
		return $this->isChecked;
	}

	public function getHasil()
	{
		return $this->hasil;
	}
}