<?php

namespace KCV\Dashboard\Core\Application\Service\BackQueue;

use KCV\Dashboard\Core\Domain\Repository\QueueRepositoryInterface;

class BackQueueService
{
	protected QueueRepositoryInterface $repository;

	public function __construct(QueueRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute($hospitalId)
	{
		try {
			$queue = $this->repository->backQueue($hospitalId);
		} catch(\Exception $e) {
			echo $e->getMessage();
        }
        return;
	}
}