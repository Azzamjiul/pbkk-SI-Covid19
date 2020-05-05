<?php

namespace KCV\Dashboard\Core\Domain\Repository;

use KCV\Dashboard\Core\Domain\Model\User;
use KCV\Dashboard\Core\Domain\Model\UserId;

interface UserRepositoryInterface 
{
	public function addUser(User $user);

	public function getAllUser() : array;

	public function findUserById(UserId $id) : ?User;

	public function LoginUser(string $key, string $password) : ?User;

	public function editUser(User $user);

	public function deleteUser(UserId $id);
}