<?php

namespace Kun\Dashboard\Infrastructure\Persistence;

use Kun\Dashboard\Core\Domain\Model\StatusCovid19;
use Kun\Dashboard\Core\Domain\Repository\StatusCovid19RepositoryInterface;

class SqlServerStatusCovid19Repository implements StatusCovid19RepositoryInterface
{
	/**
	 * @var \Phalcon\Db\Adapter\AbstractAdapter
	 */
	protected $db;

	public function __construct($db) 
	{
		$this->db = $db;
	}

	public function getAllStatusCovid19() : array
	{
		$sql = "SELECT * FROM status_covid19";

		$results = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);

		$statuscovids = [];
		if($results) {
			foreach($results as $result) {
				$statuscovid = new StatusCovid19(
					$result['id'],
					$result['nama'],
					$result['deskripsi']
				);

				array_push($statuscovids, $statuscovid);
			}
		}

		return $statuscovids;
	}

	public function findStatusCovid19ById(string $id) : ?StatusCovid19
	{
		$sql = "SELECT * FROM status_covid19 WHERE id=:id";
		$param = [
			'id' => $id
		];

		$result = $this->db->fetchOne($sql, \Phalcon\Db\Enum::FETCH_ASSOC, $param);

		if($result) {
			$statusCovid = new StatusCovid19(
				$result['id'],
				$result['nama'],
				$result['deskripsi']
			);

			return $statusCovid;
		}

		return null;
	}
}