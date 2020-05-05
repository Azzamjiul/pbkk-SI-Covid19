<?php

namespace Kun\Dashboard\Core\Application\Service\EditPasien;

use Kun\Dashboard\Core\Domain\Model\Pasien;
use Kun\Dashboard\Core\Domain\Model\PasienId;
use Kun\Dashboard\Core\Domain\Repository\PasienRepositoryInterface;

class EditPasienService
{
	protected PasienRepositoryInterface $repository;

	public function __construct(PasienRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute(EditPasienRequest $request)
	{
		try {
			$pasien = new Pasien(
				new PasienId($request->getId()),
				$request->getNamaLengkap(),
				$request->getDistrictId(),
				$request->getAlamat(),
				$request->getJenisKelamin(),
				$request->getTinggiBadan(),
				$request->getBeratBadan(),
				$request->getTekananDarah(),
				$request->getJenisPenyakit(),
				$request->getRiwayatPenyakit(),
				$request->getAlergi(),
				$request->getStatusId(),
				$this->generateTimestamp()
			);

			$this->repository->editPasien($pasien);
			
		} catch(\Exception $e) {
			throw $e;
		}
	}

	private function generateTimestamp()
	{
		return date('Y-m-d H:i:s');
	}
}