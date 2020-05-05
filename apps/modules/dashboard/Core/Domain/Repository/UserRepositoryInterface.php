<?php

namespace Kun\Dashboard\Core\Domain\Repository;

use Kun\Dashboard\Core\Domain\Model\User;
use Kun\Dashboard\Core\Domain\Model\UserId;

interface UserRepositoryInterface 
{
	public function addUser(User $user);

	public function getAllUser() : array;

	public function findUserById(UserId $id) : ?User;

	public function LoginUser(string $key, string $password) : ?User;

	public function editUser(User $user);

	public function deleteUser(UserId $id);
}