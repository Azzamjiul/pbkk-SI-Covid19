<?php

namespace KCV\Dashboard\Core\Domain\Repository;

use KCV\Dashboard\Core\Domain\Model\CekKesehatan;
use KCV\Dashboard\Core\Domain\Model\CekKesehatanId;

interface CekKesehatanRepositoryInterface
{
	public function addCekKesehatan(CekKesehatan $cekKesehatan);

	public function getAllCekKesehatan() : array;

	public function findCekKesehatanByUserId(CekKesehatanId $id) : ?CekKesehatan;

	public function editCekKesehatan(CekKesehatanId $id,$is_checked, $hasil);
}