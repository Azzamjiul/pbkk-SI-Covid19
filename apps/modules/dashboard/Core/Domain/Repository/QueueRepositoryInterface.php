<?php

namespace KCV\Dashboard\Core\Domain\Repository;

use KCV\Dashboard\Core\Domain\Model\Queue;

interface QueueRepositoryInterface 
{
    public function addQueue(Queue $queue);
    
    public function getAllQueue() : array;

    public function getNumberQueue($hospital_id) : array;

    public function getNumberAllQueue() : array;

    public function getNumberUserQueue($user_id) : ?array;

    public function nextQueue($hospital_id);

    public function backQueue($hospital_id);
}