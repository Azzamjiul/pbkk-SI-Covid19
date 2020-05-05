<?php

namespace Kun\Dashboard\Core\Domain\Repository;

use Kun\Dashboard\Core\Domain\Model\Pasien;
use Kun\Dashboard\Core\Domain\Model\PasienId;
use Kun\Dashboard\Core\Domain\Model\StatusCovid19;

interface PasienRepositoryInterface
{
	public function addPasien(Pasien $pasien);

	public function getAllPasien() : array;

	public function findPasienById(PasienId $id) : ?Pasien;

	public function editPasien(Pasien $pasien);

	public function deletePasien(PasienId $id);

	public function getCountKasus() : array;

	public function getCountKasusByPlace() : array;
}