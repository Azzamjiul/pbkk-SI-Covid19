<?php

namespace KCV\Dashboard\Core\Application\Service\GetDistricts;

use KCV\Dashboard\Core\Domain\Repository\DistrictRepositoryInterface;

class GetDistrictsService
{
	protected DistrictRepositoryInterface $repository;

	public function __construct(DistrictRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute(GetDistrictsRequest $request)
	{
		try {
			$regencyId = $request->getRegencyId();

			$districts = $this->repository->getDistricts($regencyId);
		} catch(\Exception $e) {
			throw $e;
		}

		$output = [];
		foreach($districts as $district) {
			$output[$district->getId()] = $district->getName();
		}

		return $output;
	}
}