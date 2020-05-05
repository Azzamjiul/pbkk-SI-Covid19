<?php

namespace KCV\Dashboard\Core\Domain\Repository;

use KCV\Dashboard\Core\Domain\Model\Announcement;
use KCV\Dashboard\Core\Domain\Model\AnnouncementId;

interface AnnouncementRepositoryInterface
{
	public function addAnnouncement(Announcement $announcement);

	public function getLastAnnouncement() : ?Announcement;

	public function getAllAnnouncement() : array;

	public function deleteAnnouncement(AnnouncementId $id);
}