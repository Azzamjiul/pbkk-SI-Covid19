<?php

namespace KCV\Dashboard\Core\Application\Service\FindHospital;

use KCV\Dashboard\Core\Domain\Model\Hospital;
use KCV\Dashboard\Core\Domain\Repository\HospitalRepositoryInterface;

class FindHospitalService
{
	protected HospitalRepositoryInterface $repository;

	public function __construct(HospitalRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute($id)
	{
		try {
			$result = $this->repository->findHospital($id);

			if(!isset($result)) {
				return null;
			}
		} catch(\Exception $e) {
			throw $e;
		}

		return $result;
	}
}