<?php

namespace KCV\Dashboard\Infrastructure\Persistence;

use KCV\Dashboard\Core\Domain\Model\Queue;
use KCV\Dashboard\Core\Domain\Repository\QueueRepositoryInterface;

class SqlServerQueueRepository implements QueueRepositoryInterface 
{
    /**
	 * @var \Phalcon\Db\Adapter\AbstractAdapter
	 */
	protected $db;

	public function __construct($db) 
	{
		$this->db = $db;
	}

    public function addQueue(Queue $queue){
        $sql = "INSERT INTO antrean (timestamp, user_id, hospital_id, status) VALUES(:timestamp, :user_id, :hospital_id, :status)";
		$params = [
			'timestamp' => date("Y-m-d H:i:s"),
			'user_id' => $queue->getUserId(),
			'hospital_id' => $queue->getHospitalId(),
			'status' => $queue->getStatus(),
		];

        $result = $this->db->execute($sql, $params);

        $sql2 = "UPDATE users SET queue_status=1 WHERE user_id=:user_id";
        $params2 = [ 'user_id' => $queue->getUserId() ];

        $result2 = $this->db->execute($sql2, $params2);

		return $result2;
    }
}