<?php

namespace Kun\Dashboard\Core\Domain\Repository;

use Kun\Dashboard\Core\Domain\Model\CekKesehatan;
use Kun\Dashboard\Core\Domain\Model\CekKesehatanId;

interface CekKesehatanRepositoryInterface
{
	public function addCekKesehatan(CekKesehatan $cekKesehatan);

	public function getAllCekKesehatan() : array;

	public function findCekKesehatanByUserId(CekKesehatanId $id) : ?CekKesehatan;

	public function editCekKesehatan(CekKesehatanId $id,$is_checked, $hasil);
}