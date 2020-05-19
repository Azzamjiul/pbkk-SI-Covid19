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

    public function getNumberQueue($hospital_id) : array{
		$sql = "SELECT status, COUNT(*) as jumlah
		FROM antrean
		WHERE timestamp > convert(date,
        dateadd(day,
          1-day(current_timestamp) ,
          current_timestamp
          )
		) AND hospital_id = :hospital_id
		GROUP BY status
		ORDER BY status ASC";
		$params = [ 'hospital_id' => $hospital_id ];
		
		$results = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC, $params);

		$jumlah = [];
		if($results) {
			foreach($results as $result) {
				array_push($jumlah, $result['jumlah']);
			}
		}

		return $jumlah;
	}

	public function getNumberAllQueue() : array
	{
		$sql = "SELECT hospital.id, antrean.status, COUNT(*) as jumlah
		FROM antrean
		LEFT JOIN hospital ON hospital.id = antrean.hospital_id
		WHERE timestamp > convert(date,
		dateadd(day,
		1-day(current_timestamp) ,
		current_timestamp
		)
		)
		GROUP BY antrean.status, hospital.id
		ORDER BY hospital.id ASC";
		
		$results = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);
		
		return $results;

	}
	
	public function getNumberUserQueue($user_id) : ?array
	{
		$sql1 = "SELECT id, hospital_id FROM antrean 
		WHERE user_id=:user_id AND status=0
		ORDER BY id ASC";
		$params1 = [ 'user_id' => $user_id];

		$results1 = $this->db->fetchAll($sql1, \Phalcon\Db\Enum::FETCH_ASSOC, $params1);

		$hospital_id = $results1[0]['hospital_id'];

		$sql2 = "SELECT * FROM antrean 
		WHERE hospital_id = :hospital_id
		ORDER BY id ASC";
		$params2 = [ 'hospital_id' => $hospital_id ];

		$results2 = $this->db->fetchAll($sql2, \Phalcon\Db\Enum::FETCH_ASSOC, $params2);

		$nomor = 0;
		$arr = [];
		if($results2){
			foreach($results2 as $result){
				$nomor += 1;
				if($result['user_id']==$user_id && $result['status']==0){
					break;
				}
			}
			$arr['hospital_id'] = $hospital_id;
			$arr['queue_number'] = $nomor;
			return $arr;
		}

		return null;
	}

	public function nextQueue($hospital_id)
	{
		$sql1 = "SELECT * FROM antrean 
		WHERE hospital_id=:hospital_id
		ORDER BY id ASC";
		$params1 = [ 'hospital_id' => $hospital_id];
		$results1 = $this->db->fetchAll($sql1, \Phalcon\Db\Enum::FETCH_ASSOC, $params1);

		$current_row;

		if($results1){
			foreach($results1 as $result){
				if($result['status']==0){
					$current_row = $result;
					break;
				}
			}
		}

		$sql2 = "UPDATE antrean SET status = 1
		WHERE id=:id";
		$params2 = [ 'id' => $current_row['id'] ];
		$results2 = $this->db->execute($sql2, $params2);

		return;
	}

	public function backQueue($hospital_id)
	{
		$sql1 = "SELECT * FROM antrean 
		WHERE hospital_id=:hospital_id
		ORDER BY id ASC";
		$params1 = [ 'hospital_id' => $hospital_id];
		$results1 = $this->db->fetchAll($sql1, \Phalcon\Db\Enum::FETCH_ASSOC, $params1);

		// var_dump($results1);
		// die;

		$back_row;
		$current_row;

		if($results1){
			foreach($results1 as $result){
				$back_row = $current_row;
				$current_row = $result;
				if($result['status']==0){
					break;
				}
			}
		}

		$sql2 = "UPDATE antrean SET status = 0
		WHERE id=:id";
		$params2 = [ 'id' => $back_row['id'] ];
		$results2 = $this->db->execute($sql2, $params2);

		return;
	}
}