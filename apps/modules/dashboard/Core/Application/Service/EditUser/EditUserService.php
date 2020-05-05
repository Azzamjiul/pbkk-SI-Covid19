<?php

namespace KCV\Dashboard\Core\Application\Service\EditUser;

use KCV\Dashboard\Core\Domain\Model\Password;
use KCV\Dashboard\Core\Domain\Model\User;
use KCV\Dashboard\Core\Domain\Model\UserId;
use KCV\Dashboard\Core\Domain\Repository\UserRepositoryInterface;

class EditUserService 
{
	protected UserRepositoryInterface $userRepository;

	public function __construct(UserRepositoryInterface $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function execute(EditUserRequest $request) 
	{
		try {
			$user = new User(
				new UserId($request->getUserId()),
				$request->getUsername(),
				$request->getEmail(),
				new Password($request->getPassword()),
				$request->getRole()
			);

			$this->userRepository->editUser($user);

		} catch (\Exception $e) {
			throw $e;
		}
	}
}