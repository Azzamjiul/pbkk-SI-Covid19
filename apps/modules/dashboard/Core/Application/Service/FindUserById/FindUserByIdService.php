<?php

namespace Kun\Dashboard\Core\Application\Service\FindUserById;

use Kun\Dashboard\Core\Domain\Model\UserId;
use Kun\Dashboard\Core\Domain\Repository\UserRepositoryInterface;

class FindUserByIdService 
{
	protected UserRepositoryInterface $userRepository;

	public function __construct(UserRepositoryInterface $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function execute(FindUserByIdRequest $request)
	{
		try {
			$userId = $request->getUserId();
			$user = $this->userRepository->findUserById(new UserId($userId));

			if(!isset($user)) {
				throw new \Exception("user not found");
			}

		} catch (\Exception $e) {
			throw $e;
		}

		return new FindUserByIdResponse($user);
	}
}