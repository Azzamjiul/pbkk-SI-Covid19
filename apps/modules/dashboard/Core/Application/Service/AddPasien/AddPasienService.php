<?php

namespace KCV\Dashboard\Core\Application\Service\AddPasien;

use KCV\Dashboard\Core\Domain\Model\Pasien;
use KCV\Dashboard\Core\Domain\Model\PasienId;
use KCV\Dashboard\Core\Domain\Repository\PasienRepositoryInterface;

class AddPasienService
{
	protected PasienRepositoryInterface $repository;

	public function __construct(PasienRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute(AddPasienRequest $request)
	{
		try {
			$pasien = new Pasien(
				new PasienId(),
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
				$this->generateTimestamp(),
				$request->getHospitalId()
			);

			$result = $this->repository->addPasien($pasien);

			if(!$result) {
				throw new \Exception('Gagal menambahkan pasien');
			}

		} catch(\Exception $e) {
			throw $e;
		}
	}

	private function generateTimestamp()
	{
		return date('Y-m-d H:i:s');
	}
}