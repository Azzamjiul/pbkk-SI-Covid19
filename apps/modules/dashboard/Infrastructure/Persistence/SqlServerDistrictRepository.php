<?php

namespace KCV\Dashboard\Infrastructure\Persistence;

use KCV\Dashboard\Core\Domain\Model\District;
use KCV\Dashboard\Core\Domain\Repository\DistrictRepositoryInterface;

class SqlServerDistrictRepository implements DistrictRepositoryInterface
{
	/**
	 * @var \Phalcon\Db\Adapter\AbstractAdapter
	 */
	protected $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function getDistricts($regencyId) : array
	{
		$sql = "SELECT * FROM districts WHERE regency_id=:regency_id ORDER BY name ASC";

		$param = ['regency_id' => $regencyId];

		$results = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC, $param);

		$districts = [];
		if($results) {
			foreach ($results as $result) {
				$district = new District(
					$result['id'],
					$result['name']
				);

				array_push($districts, $district);
			}
		}

		return $districts;
	}
}