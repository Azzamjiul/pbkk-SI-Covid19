<?php

namespace KCV\Dashboard\Core\Application\Service\AddUser;

use KCV\Dashboard\Core\Domain\Model\Password;
use KCV\Dashboard\Core\Domain\Model\User;
use KCV\Dashboard\Core\Domain\Model\UserId;
use KCV\Dashboard\Core\Domain\Repository\UserRepositoryInterface;

class AddUserService 
{
	protected UserRepositoryInterface $userRepository;

	public function __construct(UserRepositoryInterface $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function execute(AddUserRequest $request) 
	{
		try {
			$user = new User(
				new UserId(),
				$request->getUsername(),
				$request->getEmail(),
				new Password(password_hash($request->getPassword(), PASSWORD_BCRYPT)),
				$request->getRole(),
				$request->getHospitalId()
			);

			$result = $this->userRepository->addUser($user);

			if(!$result) {
				throw new \Exception('unable to add user');
			}

		} catch (\Exception $e) {
			throw $e;
		}
	}
}