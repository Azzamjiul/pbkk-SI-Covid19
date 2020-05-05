<?php

namespace KCV\Dashboard\Core\Application\Service\GetAllCekKesehatan;

use KCV\Dashboard\Core\Domain\Repository\CekKesehatanRepositoryInterface;

class GetAllCekKesehatanService
{
	protected CekKesehatanRepositoryInterface $repository;

	public function __construct(CekKesehatanRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute()
	{
		try {
			$cekKesehatans = $this->repository->getAllCekKesehatan();
		} catch (\Exception $e) {

		}

		return $cekKesehatans;
	}
}