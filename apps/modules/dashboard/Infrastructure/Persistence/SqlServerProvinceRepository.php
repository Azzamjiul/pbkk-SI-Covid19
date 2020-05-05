<?php

namespace Kun\Dashboard\Infrastructure\Persistence;

use Kun\Dashboard\Core\Domain\Model\Province;
use Kun\Dashboard\Core\Domain\Repository\ProvinceRepositoryInterface;

class SqlServerProvinceRepository implements ProvinceRepositoryInterface
{
	/**
	 * @var \Phalcon\Db\Adapter\AbstractAdapter
	 */
	protected $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function getAllProvince() : array
	{
		$sql = "SELECT * FROM provinces";

		$results = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);
		
		$provinces = [];
		if($results) {
			foreach ($results as $result) {
				$province = new Province(
					$result['id'],
					$result['name']
				);

				array_push($provinces, $province);
			}
		}

		return $provinces;
	}
}