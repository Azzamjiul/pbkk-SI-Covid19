<?php

namespace KCV\Dashboard\Core\Application\Service\GetAllStatusCovid19;

use KCV\Dashboard\Core\Domain\Repository\StatusCovid19RepositoryInterface;

class GetAllStatusCovid19Service
{
	protected StatusCovid19RepositoryInterface $repository;

	public function __construct(StatusCovid19RepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute()
	{
		try {
			$statuscovids = $this->repository->getAllStatusCovid19();
		} catch(\Exception $e) {
			echo $e->getMessage();
		}

		return $statuscovids;
	}
}