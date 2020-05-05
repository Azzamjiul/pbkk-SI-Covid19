<?php

namespace Kun\Dashboard\Core\Application\Service\DeletePasien;

use Kun\Dashboard\Core\Domain\Model\PasienId;
use Kun\Dashboard\Core\Domain\Repository\PasienRepositoryInterface;

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