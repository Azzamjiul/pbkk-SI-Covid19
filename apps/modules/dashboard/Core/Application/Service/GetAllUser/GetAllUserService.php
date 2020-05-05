<?php

namespace Kun\Dashboard\Core\Application\Service\GetAllUser;

use Kun\Dashboard\Core\Domain\Repository\UserRepositoryInterface;

class GetAllUserService
{
	protected UserRepositoryInterface $repository;

	public function __construct(UserRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute()
	{
		try {
			$users = $this->repository->getAllUser();
		} catch(\Exception $e) {
			echo $e->getMessage();
		}

		return $users;
	}
}