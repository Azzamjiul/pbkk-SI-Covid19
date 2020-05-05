<?php

namespace Kun\Dashboard\Core\Application\Service\GetCountKasus;

use Kun\Dashboard\Core\Domain\Repository\PasienRepositoryInterface;

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