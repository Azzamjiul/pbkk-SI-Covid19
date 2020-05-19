<?php

namespace KCV\Dashboard\Core\Application\Service\GetNumberUserQueue;

use KCV\Dashboard\Core\Domain\Repository\QueueRepositoryInterface;

class GetNumberUserQueueService
{
	protected QueueRepositoryInterface $repository;

	public function __construct(QueueRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute($hospital_id)
	{
		try {
			$result = $this->repository->getNumberUserQueue($hospital_id);

			if(!isset($result)) {
				return null;
			}
		} catch(\Exception $e) {
			throw $e;
		}

		return $result;
	}
}