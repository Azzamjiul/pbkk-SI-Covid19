<?php

namespace KCV\Dashboard\Core\Application\Service\AddHospital;

class AddHospitalRequest 
{
    protected $name;
    protected $address;
    protected $districtId;

	public function __construct(
		$name, 
        $address,
        $districtId
	)
	{
		$this->name = $name;
		$this->address = $address;
		$this->districtId = $districtId;
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
    
    public function getDistrictId()
	{
		return $this->districtId;
	}

	public function setDistrictId($districtId)
	{
		$this->districtId = $districtId;
	}
}