<?php

namespace KCV\Dashboard\Core\Application\Service\AddHospital;

use Exception;
use KCV\Dashboard\Core\Domain\Model\Hospital;
use KCV\Dashboard\Core\Domain\Repository\HospitalRepositoryInterface;

class AddHospitalService 
{
	protected HospitalRepositoryInterface $hospitalRepository;

	public function __construct(HospitalRepositoryInterface $hospitalRepository)
	{
		$this->hospitalRepository = $hospitalRepository;
	}

	public function execute(AddHospitalRequest $request) 
	{
		try {
			$hospital = new Hospital(
				$request->getName(),
                $request->getAddress(),
                $request->getDistrictId()
			);

			$result = $this->hospitalRepository->addHospital($hospital);

			if(!$result) {
				throw new Exception('unable to add rumah sakit');
			}

		} catch (\Exception $e) {
			throw $e;
		}
	}
}