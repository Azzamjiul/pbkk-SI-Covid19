<?php

namespace KCV\Dashboard\Infrastructure\Persistence;

use KCV\Dashboard\Core\Domain\Model\Announcement;
use KCV\Dashboard\Core\Domain\Model\AnnouncementId;
use KCV\Dashboard\Core\Domain\Repository\AnnouncementRepositoryInterface;

class SqlServerAnnouncementRepository implements AnnouncementRepositoryInterface
{
	/**
	 * @var \Phalcon\Db\Adapter\AbstractAdapter
	 */
	protected $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function addAnnouncement(Announcement $announcement)
	{
		$sql = "INSERT INTO announcements (id, title, content, [timestamp]) VALUES (:id, :title, :content, :timestamp)";
		$params = [
			'id' => $announcement->getId()->id(),
			'title' => $announcement->getTitle(),
			'content' => $announcement->getContent(),
			'timestamp' => $announcement->getTimestamp()
		];

		$result = $this->db->execute($sql, $params);

		return $result;
	}

	public function getLastAnnouncement() : ?Announcement
	{
		$sql = "SELECT * FROM announcements ORDER BY timestamp DESC";

		$result = $this->db->fetchOne($sql, \Phalcon\Db\Enum::FETCH_ASSOC);

		if($result) {
			$announcement = new Announcement(
				new AnnouncementId($result['id']),
				$result['title'],
				$result['content'],
				$result['timestamp']
			);

			return $announcement;
		}

		return null;
	}

	public function getAllAnnouncement() : array
	{
		$sql = "SELECT * FROM announcements ORDER BY timestamp DESC";

		$results = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);

		$announcements = [];
		if($results) {
			foreach($results as $result) {
				$announcement = new Announcement(
					new AnnouncementId($result['id']),
					$result['title'],
					$result['content'],
					$result['timestamp']
				);

				array_push($announcements, $announcement);
			}
		}

		return $announcements;
	}

	public function deleteAnnouncement(AnnouncementId $id)
	{

	}
}