<?php

namespace KCV\Dashboard\Core\Application\Service\EditCekKesehatan;

use KCV\Dashboard\Core\Domain\Model\CekKesehatanId;
use KCV\Dashboard\Core\Domain\Repository\CekKesehatanRepositoryInterface;

class EditCekKesehatanService
{
	protected CekKesehatanRepositoryInterface $repository;

	public function __construct(CekKesehatanRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute(EditCekKesehatanRequest $request)
	{
		try {
			$id = new CekKesehatanId($request->getId());
			
			$this->repository->editCekKesehatan($id, $request->getIsChecked(), $request->getHasil());

		} catch (\Exception $e) {
			throw $e;
		}
	}
}