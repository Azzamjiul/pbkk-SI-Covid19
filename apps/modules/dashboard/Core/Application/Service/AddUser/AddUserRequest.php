<?php

namespace KCV\Dashboard\Core\Application\Service\AddUser;

class AddUserRequest 
{
	protected string $username;
	protected string $email;
	protected string $password;
	protected int $role;
	protected $hospitalId;

	public function __construct(
		string $username, 
		string $email, 
		string $password, 
		int $role = 0,
		$hospitalId
	)
	{
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
		$this->role = $role;
		$this->hospitalId = $hospitalId;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function setUsername($username)
	{
		$this->username = $username;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function getRole()
	{
		return $this->role;
	}

	public function setRole($role)
	{
		$this->role = $role;
	}

	public function getHospitalId()
	{
		return $this->hospitalId;
	}

	public function setHospitalId()
	{
		$this->hospitalId = $hospitalId;
	}
}