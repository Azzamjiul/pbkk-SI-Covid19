<?php

namespace Kun\Dashboard\Core\Application\Service\EditUser;

use Kun\Dashboard\Core\Domain\Model\Password;
use Kun\Dashboard\Core\Domain\Model\User;
use Kun\Dashboard\Core\Domain\Model\UserId;
use Kun\Dashboard\Core\Domain\Repository\UserRepositoryInterface;

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