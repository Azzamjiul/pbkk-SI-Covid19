<?php

namespace KCV\Dashboard\Core\Application\Service\UpdateHospitalQueueStatus;

use KCV\Dashboard\Core\Domain\Repository\HospitalRepositoryInterface;

class UpdateHospitalQueueStatusService
{
	protected HospitalRepositoryInterface $repository;

	public function __construct(HospitalRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute($hospitalId, $newStatus)
	{
		try {
			$hospital = $this->repository->updateHospitalQueueStatus($hospitalId, $newStatus);
		} catch(\Exception $e) {
			echo $e->getMessage();
        }
        return;
	}
}