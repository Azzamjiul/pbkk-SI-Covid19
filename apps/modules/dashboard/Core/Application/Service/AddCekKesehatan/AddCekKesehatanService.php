<?php

namespace KCV\Dashboard\Core\Application\Service\AddCekKesehatan;

use KCV\Dashboard\Core\Domain\Model\CekKesehatan;
use KCV\Dashboard\Core\Domain\Model\CekKesehatanId;
use KCV\Dashboard\Core\Domain\Repository\CekKesehatanRepositoryInterface;

class AddCekKesehatanService
{
	protected CekKesehatanRepositoryInterface $repository;

	public function __construct(CekKesehatanRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute(AddCekKesehatanRequest $request)
	{
		try {
			$cekKesehatan = new CekKesehatan(
				new CekKesehatanId(),
				$request->getUserId(),
				$request->getSuhuTubuh(),
				$request->getFrekuensiNapas(),
				$request->getGejalaLain(),
				$this->generateTimestamp()
			);
			
			$result = $this->repository->addCekKesehatan($cekKesehatan);

		} catch(\Exception $e) {
			throw $e;
		}
	}

	private function generateTimestamp()
	{
		return date('Y-m-d H:i:s');
	}
}