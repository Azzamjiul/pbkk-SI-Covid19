<?php

namespace KCV\Dashboard\Core\Application\Service\GetAllProvince;

use KCV\Dashboard\Core\Domain\Repository\ProvinceRepositoryInterface;

class GetAllProvinceService
{
	protected ProvinceRepositoryInterface $repository;

	public function __construct(ProvinceRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute()
	{
		try {
			$provinces = $this->repository->getAllProvince();
		} catch(\Exception $e) {
			echo $e->getMessage();
		}

		return $provinces;
	}
}