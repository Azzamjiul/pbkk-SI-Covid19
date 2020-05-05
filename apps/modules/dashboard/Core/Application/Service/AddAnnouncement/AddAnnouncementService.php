<?php

namespace KCV\Dashboard\Core\Application\Service\AddAnnouncement;

use KCV\Dashboard\Core\Domain\Model\Announcement;
use KCV\Dashboard\Core\Domain\Model\AnnouncementId;
use KCV\Dashboard\Core\Domain\Repository\AnnouncementRepositoryInterface;

class AddAnnouncementService
{
	protected AnnouncementRepositoryInterface $repository;

	public function __construct(AnnouncementRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute(AddAnnouncementRequest $request)
	{
		try {
			$announcement = new Announcement(
				new AnnouncementId(),
				$request->getTitle(),
				$request->getContent(),
				$this->generateTimestamp()
			);

			$result = $this->repository->addAnnouncement($announcement);

			if(!$result) {
				throw new \Exception("Unable to add announcement");
			}
		} catch (\Exception $e) {
			throw $e;
		}
	}

	private function generateTimestamp()
	{
		return date('Y-m-d H:i:s');
	}
}