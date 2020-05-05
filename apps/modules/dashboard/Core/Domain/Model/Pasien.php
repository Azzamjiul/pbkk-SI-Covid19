<?php

namespace KCV\Dashboard\Core\Domain\Model;

class Pasien
{
	private PasienId $id;
	
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

	private string $namaStatus;

	private string $namaKecamatan;

	private string $namaKabupaten;

	private string $namaProvinsi;

	public function __construct(
		PasienId $id,
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
		string $statusId,
		$timestamp)
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
		$this->timestamp = $timestamp;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getNamaLengkap()
	{
		return $this->namaLengkap;
	}

	public function setNamaLengkap($namaLengkap)
	{
		$this->namaLengkap = $namaLengkap;
	}

	public function getDistrictId()
	{
		return $this->districtId;
	}

	public function setDistrictId($districtId)
	{
		$this->districtId = $districtId;
	}

	public function getAlamat()
	{
		return $this->alamat;
	}

	public function setAlamat($alamat)
	{
		$this->alamat = $alamat;
	}

	public function getJenisKelamin()
	{
		return $this->jenisKelamin;
	}

	public function setJenisKelamin($jenisKelamin)
	{
		$this->jenisKelamin = $jenisKelamin;
	}

	public function getTinggiBadan()
	{
		return $this->tinggiBadan;
	}

	public function setTinggiBadan($tinggiBadan)
	{
		$this->tinggiBadan = $tinggiBadan;
	}

	public function getBeratBadan()
	{
		return $this->beratBadan;
	}

	public function setBeratBadan($beratBadan)
	{
		$this->beratBadan = $beratBadan;
	}

	public function getTekananDarah()
	{
		return $this->tekananDarah;
	}

	public function setTekananDarah($tekananDarah)
	{
		$this->tekananDarah = $tekananDarah;
	}

	public function getJenisPenyakit()
	{
		return $this->jenisPenyakit;
	}

	public function setJenisPenyakit($jenisPenyakit)
	{
		$this->jenisPenyakit = $jenisPenyakit;
	}

	public function getRiwayatPenyakit()
	{
		return $this->riwayatPenyakit;
	}

	public function setRiwayatPenyakit($riwayatPenyakit)
	{
		$this->riwayatPenyakit = $riwayatPenyakit;
	}

	public function getAlergi()
	{
		return $this->alergi;
	}

	public function setAlergi($alergi)
	{
		$this->alergi = $alergi;
	}

	public function getStatusId()
	{
		return $this->statusId;
	}

	public function setStatusId($statusId)
	{
		$this->statusId = $statusId;
	}

	public function getTimestamp()
	{
		return $this->timestamp;
	}

	public function getNamaStatus()
	{
		return $this->namaStatus;
	}

	public function setNamaStatus($namaStatus)
	{
		$this->namaStatus = $namaStatus;
	}

	public function getNamaKecamatan()
	{
		return $this->namaKecamatan;
	}

	public function setNamaKecamatan($namaKecamatan)
	{
		$this->namaKecamatan = $namaKecamatan;
	}

	public function getNamaKabupaten()
	{
		return $this->namaKabupaten;
	}

	public function setNamaKabupaten($namaKabupaten)
	{
		$this->namaKabupaten = $namaKabupaten;
	}

	public function getNamaProvinsi()
	{
		return $this->namaProvinsi;
	}

	public function setNamaProvinsi($namaProvinsi)
	{
		$this->namaProvinsi = $namaProvinsi;
	}
}