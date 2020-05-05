<?php

namespace KCV\Dashboard\Core\Application\Service\GetCountKasus;

use KCV\Dashboard\Core\Domain\Repository\PasienRepositoryInterface;

class GetCountKasusService
{
	protected PasienRepositoryInterface $repository;

	public function __construct(PasienRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute()
	{
		try {
			$jumlahs = $this->repository->getCountKasus();
		} catch (\Throwable $th) {
			//throw $th;
		}

		return new GetCountKasusResponse($jumlahs);
	}
}