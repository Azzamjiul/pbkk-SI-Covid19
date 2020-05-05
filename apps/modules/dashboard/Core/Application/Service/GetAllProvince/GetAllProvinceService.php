<?php

namespace Kun\Dashboard\Core\Application\Service\GetAllProvince;

use Kun\Dashboard\Core\Domain\Repository\ProvinceRepositoryInterface;

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