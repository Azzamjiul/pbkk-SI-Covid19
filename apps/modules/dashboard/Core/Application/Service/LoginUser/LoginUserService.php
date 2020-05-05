<?php

namespace Kun\Dashboard\Core\Application\Service\LoginUser;

use Kun\Dashboard\Core\Domain\Repository\UserRepositoryInterface;

class LoginUserService 
{
	protected UserRepositoryInterface $userRepository;

	public function __construct(UserRepositoryInterface $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function execute(LoginUserRequest $request)
	{
		try {
			$keyValue = $request->getKeyValue();
			$password = $request->getPassword();
			$user = $this->userRepository->LoginUser($keyValue, $password);

			if(!isset($user)) {
				throw new \Exception("user not found");
			}

		} catch (\Exception $e) {
			throw $e;
		}

		return new LoginUserResponse($user);
	}
}