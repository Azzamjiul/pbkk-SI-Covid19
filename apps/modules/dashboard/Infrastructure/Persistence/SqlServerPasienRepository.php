<?php

namespace KCV\Dashboard\Infrastructure\Persistence;

use KCV\Dashboard\Core\Domain\Model\Kasus;
use KCV\Dashboard\Core\Domain\Model\Pasien;
use KCV\Dashboard\Core\Domain\Model\PasienId;
use KCV\Dashboard\Core\Domain\Model\StatusCovid19;
use KCV\Dashboard\Core\Domain\Repository\PasienRepositoryInterface;

class SqlServerPasienRepository implements PasienRepositoryInterface
{
	/**
	 * @var \Phalcon\Db\Adapter\AbstractAdapter
	 */
	protected $db;

	public function __construct($db) 
	{
		$this->db = $db;
	}

	public function addPasien(Pasien $pasien)
	{
		$sql = "INSERT INTO pasiens (id, nama_lengkap, district_id, alamat, jenis_kelamin, tinggi_badan, berat_badan, tekanan_darah, jenis_penyakit, riwayat_penyakit, alergi, status_id, [timestamp]) VALUES(:id, :nama_lengkap, :district_id, :alamat, :jenis_kelamin, :tinggi_badan, :berat_badan, :tekanan_darah, :jenis_penyakit, :riwayat_penyakit, :alergi, :status_id, :timestamp)";
		$params = [
			'id' => $pasien->getId()->id(),
			'nama_lengkap' => $pasien->getNamaLengkap(),
			'district_id' => $pasien->getDistrictId(),
			'alamat' => $pasien->getAlamat(),
			'jenis_kelamin' => $pasien->getJenisKelamin(),
			'tinggi_badan' => $pasien->getTinggiBadan(),
			'berat_badan' => $pasien->getBeratBadan(),
			'tekanan_darah' => $pasien->getTekananDarah(),
			'jenis_penyakit' => $pasien->getJenisPenyakit(),
			'riwayat_penyakit' => $pasien->getRiwayatPenyakit(),
			'alergi' => $pasien->getAlergi(),
			'status_id' => $pasien->getStatusId(),
			'timestamp' => $pasien->getTimestamp()
		];

		$result = $this->db->execute($sql, $params);

		return $result;
	}

	public function getAllPasien() : array
	{
		$sql = "SELECT pasiens.*, 
		status_covid19.nama as nama_status, 
		districts.name as nama_kecamatan,
		regencies.name as nama_kabupaten,
		provinces.name as nama_provinsi
	FROM pasiens 
	LEFT JOIN status_covid19 ON pasiens.status_id = status_covid19.id
	LEFT JOIN districts ON pasiens.district_id = districts.id 
	LEFT JOIN regencies ON districts.regency_id = regencies.id
	LEFT JOIN provinces ON provinces.id = regencies.province_id ;";

		$results = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);

		$pasiens = [];
		if($results) {
			foreach($results as $result) {
				$pasien = new Pasien(
					new PasienId($result['id']),
					$result['nama_lengkap'],
					$result['district_id'],
					$result['alamat'],
					$result['jenis_kelamin'],
					$result['tinggi_badan'],
					$result['berat_badan'],
					$result['tekanan_darah'],
					$result['jenis_penyakit'],
					$result['riwayat_penyakit'],
					$result['alergi'],
					$result['status_id'],
					$result['timestamp']
				);

				$pasien->setNamaStatus($result['nama_status']);
				$pasien->setNamaKecamatan($result['nama_kecamatan']);
				$pasien->setNamaKabupaten($result['nama_kabupaten']);
				$pasien->setNamaProvinsi($result['nama_provinsi']);

				array_push($pasiens, $pasien);
			}
		}

		return $pasiens;
	}

	public function findPasienById(PasienId $id) : ?Pasien
	{
		$sql = "SELECT pasiens.*, 
		status_covid19.nama as nama_status, 
		districts.name as nama_kecamatan,
		regencies.name as nama_kabupaten,
		provinces.name as nama_provinsi
	FROM pasiens 
	LEFT JOIN status_covid19 ON pasiens.status_id = status_covid19.id
	LEFT JOIN districts ON pasiens.district_id = districts.id 
	LEFT JOIN regencies ON districts.regency_id = regencies.id
	LEFT JOIN provinces ON provinces.id = regencies.province_id 
	WHERE pasiens.id=:id";
		$param = [
			'id' => $id->id()
		];

		$result = $this->db->fetchOne($sql, \Phalcon\Db\Enum::FETCH_ASSOC, $param);

		if($result) {
			$pasien = new Pasien(
				new PasienId($result['id']),
				$result['nama_lengkap'],
				$result['district_id'],
				$result['alamat'],
				$result['jenis_kelamin'],
				$result['tinggi_badan'],
				$result['berat_badan'],
				$result['tekanan_darah'],
				$result['jenis_penyakit'],
				$result['riwayat_penyakit'],
				$result['alergi'],
				$result['status_id'],
				$result['timestamp']
			);

			$pasien->setNamaStatus($result['nama_status']);
			$pasien->setNamaKecamatan($result['nama_kecamatan']);
			$pasien->setNamaKabupaten($result['nama_kabupaten']);
			$pasien->setNamaProvinsi($result['nama_provinsi']);

			return $pasien;
		}

		return null;
	}

	public function editPasien(Pasien $pasien)
	{
		$sql = "UPDATE pasiens SET 
			nama_lengkap=:nama_lengkap, 
			district_id=:district_id, 
			alamat=:alamat, 
			jenis_kelamin=:jenis_kelamin, 
			tinggi_badan=:tinggi_badan, 
			berat_badan=:berat_badan, 
			tekanan_darah=:tekanan_darah, 
			jenis_penyakit=:jenis_penyakit, 
			riwayat_penyakit=:riwayat_penyakit, 
			alergi=:alergi, 
			status_id=:status_id, 
			timestamp=:timestamp 
		WHERE id=:id";
		
		$params = [
			'nama_lengkap' => $pasien->getNamaLengkap(),
			'district_id' => $pasien->getDistrictId(),
			'alamat' => $pasien->getAlamat(),
			'jenis_kelamin' => $pasien->getJenisKelamin(),
			'tinggi_badan' => $pasien->getTinggiBadan(),
			'berat_badan' => $pasien->getBeratBadan(),
			'tekanan_darah' => $pasien->getTekananDarah(),
			'jenis_penyakit' => $pasien->getJenisPenyakit(),
			'riwayat_penyakit' => $pasien->getRiwayatPenyakit(),
			'alergi' => $pasien->getAlergi(),
			'status_id' => $pasien->getStatusId(),
			'timestamp' => $pasien->getTimestamp(),
			'id' => $pasien->getId()->id()
		];

		$result = $this->db->execute($sql, $params);

		return $result;
	}

	public function deletePasien(PasienId $id)
	{
		$sql = "DELETE FROM pasiens WHERE id=:id";
		$param = [
			'id' => $id->id()
		];

		$result = $this->db->execute($sql, $param);

		return $result;
	}

	public function getCountKasus() : array
	{
		$sql = "SELECT sc.nama as nama,COUNT(*) as jumlah, CONVERT(datetime, p.[timestamp], 103) as waktu
		from pasiens p
		LEFT JOIN status_covid19 sc ON sc.id = p.status_id 
		GROUP BY CONVERT(datetime, p.[timestamp], 103), sc.nama
		ORDER BY CONVERT(datetime, p.[timestamp], 103) ASC;";

		$results = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);

		$jumlahs = [];
		if($results) {
			foreach($results as $result) {
				$hasil = new Kasus(
					$result['nama'],
					$result['jumlah'],
					$result['waktu']
				);

				array_push($jumlahs, $hasil);
			}
		}

		return $jumlahs;
	}

	public function getCountKasusByPlace() : array
	{
		$sql = "SELECT count(a.status_id) as jumlah, a.nama_status, a.nama_kabupaten, a.nama_provinsi FROM (
			SELECT pasiens.*, 
				status_covid19.nama as nama_status, 
				districts.name as nama_kecamatan,
				regencies.name as nama_kabupaten,
				provinces.name as nama_provinsi
			FROM pasiens 
			LEFT JOIN status_covid19 ON pasiens.status_id = status_covid19.id
			LEFT JOIN districts ON pasiens.district_id = districts .id 
			LEFT JOIN regencies ON districts.regency_id = regencies.id
			LEFT JOIN provinces ON provinces.id = regencies.province_id
		) a
		GROUP BY a.nama_kabupaten, a.nama_status, a.nama_provinsi;";

		$results = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);

		return $results;
	}
}