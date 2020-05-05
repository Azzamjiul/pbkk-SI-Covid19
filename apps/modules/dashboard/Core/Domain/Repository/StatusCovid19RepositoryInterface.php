<?php

namespace KCV\Dashboard\Core\Domain\Repository;

use KCV\Dashboard\Core\Domain\Model\StatusCovid19;

interface StatusCovid19RepositoryInterface
{
	public function getAllStatusCovid19() : array;

	public function findStatusCovid19ById(string $id) : ?StatusCovid19;
}