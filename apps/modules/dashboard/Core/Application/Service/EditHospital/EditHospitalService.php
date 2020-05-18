<?php

namespace KCV\Dashboard\Core\Application\Service\EditHospital;

use KCV\Dashboard\Core\Domain\Model\Hospital;
use KCV\Dashboard\Core\Domain\Repository\HospitalRepositoryInterface;

class EditHospitalService
{
	protected HospitalRepositoryInterface $repository;

	public function __construct(HospitalRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute(EditHospitalRequest $request)
	{
		try {
			$hospital = new Hospital(
				$request->getName(),
				$request->getAddress(),
				$request->getDistrictId(),
				$request->getQuota(),
				$request->getFilled(),
				$request->getDoctorNumber(),
				$request->getNurseNumber(),
				$request->getPersonnelNumber(),
				0,
				$request->getId()
			);

			$this->repository->editHospital($hospital);
			
		} catch(\Exception $e) {
			throw $e;
		}
	}
}