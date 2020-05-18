<?php

namespace KCV\Dashboard\Infrastructure\Persistence;

use KCV\Dashboard\Core\Domain\Model\Poster;
use KCV\Dashboard\Core\Domain\Repository\PosterRepositoryInterface;

class SqlServerPosterRepository implements PosterRepositoryInterface
{
	/**
	 * @var \Phalcon\Db\Adapter\AbstractAdapter
	 */
	protected $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function addPoster(Poster $poster)
	{
		$sql = "INSERT INTO posters (name, path, timestamp) VALUES (:name, :path, :timestamp)";
		$params = [
			'name' => $poster->getName(),
			'path' => $poster->getPath(),
			'timestamp' => $poster->getTimestamp()
		];

		$result = $this->db->execute($sql, $params);

		return $result;
	}

	public function getAllPoster() : array
	{
		$sql = "SELECT * FROM posters ORDER BY timestamp DESC";

		$results = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);

		$posters = [];
		if($results) {
			foreach($results as $result) {
				$poster = new Poster(
					$result['name'],
					$result['path'],
					$result['timestamp'],
					$result['id']
				);

				array_push($posters, $poster);
			}
		}
		
		return $posters;
	}

	public function findPosterById($id) : ?Poster
	{
		$sql = "SELECT * FROM posters WHERE id=:id";
		$param = ['id' => $id];

		$result = $this->db->fetchOne($sql, \Phalcon\Db\Enum::FETCH_ASSOC, $param);

		if($result) {
			$poster = new Poster(
				$result['name'],
				$result['path'],
				$result['timestamp'],
				$result['id']
			);

			return $poster;
		}

		return null;
	}

	public function editPoster(Poster $poster)
	{
		$sql = "UPDATE posters SET name=:name, path=:path, timestamp=:timestamp WHERE id=:id";
		$params = [
			'name' => $poster->getName(),
			'path' => $poster->getPath(),
			'timestamp' => $poster->getTimestamp(),
			'id' => $poster->getId()
		];

		$result = $this->db->execute($sql, $params);

		return $result;
	}

	public function deletePoster($id)
	{

	}
}