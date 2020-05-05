<?php

namespace KCV\Dashboard\Core\Domain\Repository;

use KCV\Dashboard\Core\Domain\Model\Antrean;

interface AntreanRepositoryInterface 
{
	public function addAntrean(Antrean $antrean);
}