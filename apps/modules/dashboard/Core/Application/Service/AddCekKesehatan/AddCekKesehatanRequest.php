<?php

namespace Kun\Dashboard\Core\Application\Service\AddCekKesehatan;

class AddCekKesehatanRequest
{
	private string $userId;

	private int $suhuTubuh;
	
	private int $frekuensiNapas;

	private ?string $gejalaLain;

	private ?string $riwayatPerjalanan;

	public function __construct(
		$userId, 
		$suhuTubuh, 
		$frekuensiNapas,
		$gejalaLain,
		$riwayatPerjalanan
	)
	{
		$this->userId = $userId;
		$this->suhuTubuh = $suhuTubuh;
		$this->frekuensiNapas = $frekuensiNapas;
		$this->gejalaLain = $gejalaLain;
		$this->riwayatPerjalanan = $riwayatPerjalanan;
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

	public function getRiwayatPerjalanan()
	{
		return $this->riwayatPerjalanan;
	}
}