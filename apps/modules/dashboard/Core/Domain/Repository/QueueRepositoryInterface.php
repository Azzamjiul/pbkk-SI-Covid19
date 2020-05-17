<?php

namespace KCV\Dashboard\Core\Domain\Repository;

use KCV\Dashboard\Core\Domain\Model\Queue;

interface QueueRepositoryInterface 
{
	public function addQueue(Queue $queue);
}