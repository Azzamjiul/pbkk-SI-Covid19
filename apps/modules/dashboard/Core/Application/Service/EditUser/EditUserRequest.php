<?php

namespace Kun\Dashboard\Core\Application\Service\EditUser;

class EditUserRequest 
{
	protected string $userId;
	protected string $username;
	protected string $email;
	protected string $password;
	protected int $role;

	public function __construct(
		string $userId,
		string $username, 
		string $email, 
		string $password, 
		int $role = 0
	)
	{
		$this->userId = $userId;
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
		$this->role = $role;
	}

	public function getUserId()
	{
		return $this->userId;
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
}