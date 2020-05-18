<?php

namespace KCV\Dashboard\Infrastructure\Persistence;

use KCV\Dashboard\Core\Domain\Model\Hospital;
use KCV\Dashboard\Core\Domain\Repository\HospitalRepositoryInterface;

class SqlServerHospitalRepository implements HospitalRepositoryInterface 
{
    protected $db;

	public function __construct($db) 
	{
		$this->db = $db;
    }
    
    public function getAllHospital() : ?array
    {
        $sql = "SELECT * FROM HOSPITAL";

        $results = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);
        
        $all_hospital = [];
		if($results) {
			foreach ($results as $result) {
				$hospital = new Hospital(
					$result['name'],
					$result['address'],
                    $result['district_id'],
					$result['quota'],
					$result['filled'],
					$result['doctor_number'],
					$result['nurse_number'],
					$result['personnel_number'],
					$result['queue_status'],
					$result['id'],
				);

				array_push($all_hospital, $hospital);
			}
		}

		return $all_hospital;
	}
	
	public function addHospital( Hospital $hospital )
    {
        $sql = "INSERT INTO HOSPITAL (name, address, district_id) VALUES (:name, :address, :districtId)";

        $params = [
			'name' => $hospital->getName(),
			'address' => $hospital->getAddress(),
			'districtId' => $hospital->getDistrictId()
        ];
        
        $result = $this->db->execute($sql, $params);

		return $result;
	}

	public function findHospital( $id ) : ?Hospital
	{
		$sql = "SELECT hospital.*,
		districts.name as nama_kecamatan,
		regencies.name as nama_kabupaten,
		provinces.name as nama_provinsi
		FROM hospital
		LEFT JOIN districts ON hospital.district_id = districts.id 
		LEFT JOIN regencies ON districts.regency_id = regencies.id
		LEFT JOIN provinces ON provinces.id = regencies.province_id 
		WHERE hospital.id = :id";
		$params = [
			'id' => $id
        ];
        $result = $this->db->fetchOne($sql, \Phalcon\Db\Enum::FETCH_ASSOC, $params);
        
		if($result) {
			$hospital = new Hospital(
				$result['name'],
				$result['address'],
				$result['district_id'],
				$result['quota'],
				$result['filled'],
				$result['doctor_number'],
				$result['nurse_number'],
				$result['personnel_number'],
				$result['queue_status'],
				$result['id']
			);

			$hospital->setNamaKecamatan($result['nama_kecamatan']);
			$hospital->setNamaKabupaten($result['nama_kabupaten']);
			$hospital->setNamaProvinsi($result['nama_provinsi']);

			return $hospital;

		}

		return null;

	}

	public function updateHospitalQueueStatus($hospitalId, $newStatus)
	{
		$sql = "UPDATE hospital SET queue_status=:newStatus WHERE id=:hospitalId";
		$params = [
			'hospitalId' => $hospitalId,
			'newStatus' => $newStatus
		];

		$result = $this->db->execute($sql, $params);

		return;
	}

	public function editHospital( Hospital $hospital)
	{
		$sql = "UPDATE hospital SET 
			name=:name, 
			district_id=:district_id, 
			address=:address, 
			quota=:quota, 
			filled=:filled, 
			doctor_number=:doctor_number, 
			nurse_number=:nurse_number, 
			personnel_number=:personnel_number
		WHERE id=:id";
		
		$params = [
			'name' => $hospital->getName(),
			'district_id' => $hospital->getDistrictId(),
			'address' => $hospital->getAddress(),
			'quota' => $hospital->getQuota(),
			'filled' => $hospital->getFilled(),
			'doctor_number' => $hospital->getDoctorNumber(),
			'nurse_number' => $hospital->getNurseNumber(),
			'personnel_number' => $hospital->getPersonnelNumber(),
			'id' => $hospital->getId()
		];

		$result = $this->db->execute($sql, $params);

		return $result;
	}

}