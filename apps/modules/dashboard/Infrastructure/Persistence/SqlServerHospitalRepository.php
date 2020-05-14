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
					$result['id'],
                    $result['district_id'],
					$result['quota'],
					$result['filled'],
					$result['doctor_number'],
					$result['nurse_number'],
					$result['personnel_number'],
					$result['queue_status'],
				);

				array_push($all_hospital, $hospital);
			}
		}

		return $all_hospital;
    }
}