<?php

namespace KCV\Dashboard\Infrastructure\Persistence;

use KCV\Dashboard\Core\Domain\Model\Regency;
use KCV\Dashboard\Core\Domain\Repository\RegencyRepositoryInterface;

class SqlServerRegencyRepository implements RegencyRepositoryInterface 
{
	/**
	 * @var \Phalcon\Db\Adapter\AbstractAdapter
	 */
	protected $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function getRegencies($provinceId) : array
	{
		$sql = "SELECT * FROM regencies WHERE province_id=:province_id ORDER BY name";
		
		$param = ['province_id' => $provinceId];

		$results = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC, $param);

		$regencies = [];
		if($results) {
			foreach ($results as $result) {
				$regency = new Regency(
					$result['id'],
					$result['name']
				);

				array_push($regencies, $regency);
			}
		}

		return $regencies;
	}
}