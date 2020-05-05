<?php

namespace KCV\Dashboard\Core\Application\Service\FindCekKesehatanById;

use KCV\Dashboard\Core\Domain\Model\CekKesehatanId;
use KCV\Dashboard\Core\Domain\Repository\CekKesehatanRepositoryInterface;

class FindCekKesehatanByIdService
{
	protected CekKesehatanRepositoryInterface $repository;

	public function __construct(CekKesehatanRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute(FindCekKesehatanByIdRequest $request)
	{
		try {
			$cekId =$request->getCekId();
			$cek = $this->repository->findCekKesehatanByUserId(new CekKesehatanId($cekId));

			if(!isset($cek)) {
				return null;
			}
		} catch(\Exception $e) {
			throw $e;
		}

		return $cek;
	}
}