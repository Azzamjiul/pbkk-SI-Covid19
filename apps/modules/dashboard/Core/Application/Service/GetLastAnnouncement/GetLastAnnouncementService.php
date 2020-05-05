<?php

namespace KCV\Dashboard\Core\Application\Service\GetLastAnnouncement;

use KCV\Dashboard\Core\Domain\Repository\AnnouncementRepositoryInterface;

class GetLastAnnouncementService
{
	protected AnnouncementRepositoryInterface $repository;

	public function __construct(AnnouncementRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute()
	{
		try {
			$announcement = $this->repository->getLastAnnouncement();
		} catch (\Exception $e) {
			echo $e->getMessage();
		}

		return $announcement;
	}
}