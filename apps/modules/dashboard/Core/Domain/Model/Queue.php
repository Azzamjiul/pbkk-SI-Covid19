<?php

namespace KCV\Dashboard\Core\Domain\Model;

class Queue
{
    private $timestamp;
    
    private $id;

    private $user_id;

    private int $hospital_id;

    private int $status;

    public function __construct($user_id, $hospital_id, $status=0, $timestamp=NULL, $id = NULL)
	{
		$this->timestamp = $timestamp;
		$this->id = $id;
		$this->user_id = $user_id;
		$this->hospital_id = $hospital_id;
		$this->status = $status;
    }
    
    public function getTimestamp()
	{
		return $this->timestamp;
	}

	public function setTimestamp($timestamp)
	{
		$this->timestamp = $timestamp;
    }
    
    public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
    }
    
    public function getUserId()
	{
		return $this->user_id;
	}

	public function setUserId($user_id)
	{
		$this->user_id = $user_id;
    }
    
    public function getHospitalId()
	{
		return $this->hospital_id;
	}

	public function setHospitalId($hospital_id)
	{
		$this->hospital_id = $hospital_id;
    }
    
    public function getStatus()
	{
		return $this->status;
	}

	public function setStatus($status)
	{
		$this->status = $status;
	}
}