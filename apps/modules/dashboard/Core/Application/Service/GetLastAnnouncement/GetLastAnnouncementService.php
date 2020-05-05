<?php

namespace Kun\Dashboard\Core\Application\Service\GetLastAnnouncement;

use Kun\Dashboard\Core\Domain\Repository\AnnouncementRepositoryInterface;

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