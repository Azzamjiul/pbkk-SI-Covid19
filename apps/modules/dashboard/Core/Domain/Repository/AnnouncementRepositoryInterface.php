<?php

namespace Kun\Dashboard\Core\Domain\Repository;

use Kun\Dashboard\Core\Domain\Model\Announcement;
use Kun\Dashboard\Core\Domain\Model\AnnouncementId;

interface AnnouncementRepositoryInterface
{
	public function addAnnouncement(Announcement $announcement);

	public function getLastAnnouncement() : ?Announcement;

	public function getAllAnnouncement() : array;

	public function deleteAnnouncement(AnnouncementId $id);
}