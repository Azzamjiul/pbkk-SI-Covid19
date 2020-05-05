<?php

namespace Kun\Dashboard\Core\Application\Service\AddUser;

use Kun\Dashboard\Core\Domain\Model\Password;
use Kun\Dashboard\Core\Domain\Model\User;
use Kun\Dashboard\Core\Domain\Model\UserId;
use Kun\Dashboard\Core\Domain\Repository\UserRepositoryInterface;

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
				$request->getRole()
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