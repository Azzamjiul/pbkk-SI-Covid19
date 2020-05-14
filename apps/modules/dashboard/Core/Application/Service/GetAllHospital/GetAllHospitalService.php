<?php

namespace KCV\Dashboard\Core\Application\Service\GetAllHospital;

use KCV\Dashboard\Core\Domain\Repository\HospitalRepositoryInterface;

class GetAllHospitalService
{
	protected HospitalRepositoryInterface $repository;

	public function __construct(HospitalRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute()
	{
		try {
			$hospital = $this->repository->getAllHospital();
		} catch(\Exception $e) {
			echo $e->getMessage();
		}

		return $hospital;
	}
}