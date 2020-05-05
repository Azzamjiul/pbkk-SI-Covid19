<?php

namespace Kun\Dashboard\Core\Application\Service\EditPasien;

class EditPasienRequest
{
	private string $id;

	private string $namaLengkap;

	private string $districtId;

	private string $alamat;

	private string $jenisKelamin;

	private int $tinggiBadan;

	private int $beratBadan;

	private string $tekananDarah;

	private string $jenisPenyakit;

	private ?string $riwayatPenyakit;

	private ?string $alergi;

	private string $statusId;

	private $timestamp;

	public function __construct(
		$id,
		string $namaLengkap,
		string $districtId,
		string $alamat,
		string $jenisKelamin,
		int $tinggiBadan,
		int $beratBadan,
		string $tekananDarah,
		string $jenisPenyakit,
		?string $riwayatPenyakit,
		?string $alergi,
		string $statusId)
	{
		$this->id = $id;
		$this->namaLengkap = $namaLengkap;
		$this->districtId = $districtId;
		$this->alamat = $alamat;
		$this->jenisKelamin = $jenisKelamin;
		$this->tinggiBadan = $tinggiBadan;
		$this->beratBadan = $beratBadan;
		$this->tekananDarah = $tekananDarah;
		$this->jenisPenyakit = $jenisPenyakit;
		$this->riwayatPenyakit = $riwayatPenyakit;
		$this->alergi = $alergi;
		$this->statusId = $statusId;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getNamaLengkap()
	{
		return $this->namaLengkap;
	}

	public function getDistrictId()
	{
		return $this->districtId;
	}

	public function getAlamat()
	{
		return $this->alamat;
	}

	public function getJenisKelamin()
	{
		return $this->jenisKelamin;
	}

	public function getTinggiBadan()
	{
		return $this->tinggiBadan;
	}

	public function getBeratBadan()
	{
		return $this->beratBadan;
	}

	public function getTekananDarah()
	{
		return $this->tekananDarah;
	}

	public function getJenisPenyakit()
	{
		return $this->jenisPenyakit;
	}

	public function getRiwayatPenyakit()
	{
		return $this->riwayatPenyakit;
	}

	public function getAlergi()
	{
		return $this->alergi;
	}

	public function getStatusId()
	{
		return $this->statusId;
	}
}