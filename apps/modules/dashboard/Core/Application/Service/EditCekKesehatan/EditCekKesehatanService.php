<?php

namespace Kun\Dashboard\Core\Application\Service\EditCekKesehatan;

use Kun\Dashboard\Core\Domain\Model\CekKesehatanId;
use Kun\Dashboard\Core\Domain\Repository\CekKesehatanRepositoryInterface;

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