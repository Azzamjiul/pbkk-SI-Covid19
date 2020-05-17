<?php

namespace KCV\Dashboard\Core\Application\Service\AddQueue;

use Exeption;
use KCV\Dashboard\Core\Domain\Model\Queue;
use KCV\Dashboard\Core\Domain\Repository\QueueRepositoryInterface;

class AddQueueService
{
    protected QueueRepositoryInterface $queueRepository;

    public function __construct(QueueRepositoryInterface $queueRepository)
    {
        $this->queueRepository = $queueRepository;
    }

    public function execute($hospital_id, $user_id)
    {
        $request = new Queue($user_id, $hospital_id);
        try {
            $result = $this->queueRepository->addQueue($request);
		} catch (\Exception $e) {
			throw $e;
		}   
    }
}