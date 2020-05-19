<?php

namespace KCV\Dashboard\Core\Application\Service\NextQueue;

use KCV\Dashboard\Core\Domain\Repository\QueueRepositoryInterface;

class NextQueueService
{
	protected QueueRepositoryInterface $repository;

	public function __construct(QueueRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute($hospitalId)
	{
		try {
			$queue = $this->repository->nextQueue($hospitalId);
		} catch(\Exception $e) {
			echo $e->getMessage();
        }
        return;
	}
}