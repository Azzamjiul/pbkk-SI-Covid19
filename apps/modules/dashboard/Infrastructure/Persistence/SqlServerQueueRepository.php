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

    public function addQueue(Queue $queue)
    {
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

    public function getAllQueue() : array
    {
        $sql = "SELECT * FROM antrean WHERE timestamp > convert(date,
        dateadd(day,
          1-day(current_timestamp) ,
          current_timestamp
          )
        ) ORDER BY id ASC";
        
        $results = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);
		
		$queues = [];
		if($results) {
			foreach ($results as $result) {
				$queue = new Queue(
					$result['user_id'],
					$result['hospital_id'],
					$result['status'],
					$result['timestamp'],
					$result['id']
				);

				array_push($queues, $queue);
			}
		}

		return $queues;
    }
}