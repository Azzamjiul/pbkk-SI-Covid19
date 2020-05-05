<?php

namespace KCV\Dashboard\Core\Application\Service\DeletePasien;

use KCV\Dashboard\Core\Domain\Model\PasienId;
use KCV\Dashboard\Core\Domain\Repository\PasienRepositoryInterface;

class DeletePasienService
{
	protected PasienRepositoryInterface $repository;

	public function __construct(PasienRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute(DeletePasienRequest $request)
	{
		try {
			$result = $this->repository->deletePasien(new PasienId($request->getId()));

			return $result;
		} catch(\Exception $e) {
			throw $e;
		}
	}
}