<?php

namespace KCV\Dashboard\Core\Domain\Model;

class Hospital
{   
    private $id;
    
    private $district_id;

	private $name;

	private $address;

    private $quota;
    
    private $filled;

    private $doctor_number;

    private $nurse_number;

	private $personnel_number;
	
	private $queue_status;

    public function __construct(
		$name, 
		$address, 
		$district_id = NULL, 
		$quota = NULL, 
		$filled = NULL, 
		$doctor_number = NULL,
		$nurse_number = NULL, 
		$personnel_number = NULL,
		$queue_status = 0,
		$id = NULL
		)
	{
		$this->id = $id;
        $this->district_id = $district_id;
        $this->name = $name;
        $this->address = $address;
        $this->quota = $quota;
        $this->filled = $filled;
        $this->doctor_number = $doctor_number;
        $this->nurse_number = $nurse_number;
		$this->personnel_number = $personnel_number;
		$this->queue_status = $queue_status;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

    public function getDistrictId()
	{
		return $this->district_id;
	}

	public function setDistrictId($district_id)
	{
		$this->district_id = $district_id;
    }
    
    public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
    }
    
    public function getAddress()
	{
		return $this->address;
	}

	public function setAddress($address)
	{
		$this->address = $address;
    }
    
    public function getQuota()
	{
		return $this->quota;
	}

	public function setQuota($quota)
	{
		$this->quota = $quota;
    }
    
    public function getFilled()
	{
		return $this->filled;
	}

	public function setFilled($filled)
	{
		$this->filled = $filled;
    }
    
    public function getDoctorNumber()
	{
		return $this->doctor_number;
	}

	public function setDoctorNumber($doctor_number)
	{
		$this->doctor_number = $doctor_number;
    }
    
    public function getNurseNumber()
	{
		return $this->nurse_number;
	}

	public function setNurseNumber($nurse_number)
	{
		$this->nurse_number = $nurse_number;
    }
    
    public function getPersonnelNumber()
	{
		return $this->personnel_number;
	}

	public function setPersonnelNumber($personnel_number)
	{
		$this->personnel_number = $personnel_number;
	}
	
	public function getQueueStatus()
	{
		return $this->queue_status;
	}

	public function setQueueStatus($queue_status)
	{
		$this->queue_status = $queue_status;
	}
}