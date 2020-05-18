<?php

namespace KCV\Dashboard\Core\Application\Service\GetAllQueue;

use KCV\Dashboard\Core\Domain\Repository\QueueRepositoryInterface;

class GetAllQueueService
{
	protected QueueRepositoryInterface $repository;

	public function __construct(QueueRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute()
	{
		try {
			$queues = $this->repository->getAllQueue();
		} catch(\Exception $e) {
			echo $e->getMessage();
		}

		return $queues;
	}
}