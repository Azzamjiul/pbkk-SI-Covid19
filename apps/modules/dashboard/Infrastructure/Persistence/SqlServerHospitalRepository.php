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
		$sql = "SELECT * FROM HOSPITAL WHERE id = :id";
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
		}

		return $hospital;
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
}