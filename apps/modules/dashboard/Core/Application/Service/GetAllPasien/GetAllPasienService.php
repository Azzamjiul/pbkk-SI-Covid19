<?php

namespace Kun\Dashboard\Core\Application\Service\GetAllPasien;

use Kun\Dashboard\Core\Domain\Repository\PasienRepositoryInterface;

class GetAllPasienService
{
	protected PasienRepositoryInterface $repository;

	public function __construct(PasienRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute()
	{
		try {
			$pasiens = $this->repository->getAllPasien();
		} catch(\Exception $e) {
			echo $e->getMessage();
		}

		return $pasiens;
	}
}