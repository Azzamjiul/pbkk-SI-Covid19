<?php

namespace Kun\Dashboard\Core\Domain\Repository;

use Kun\Dashboard\Core\Domain\Model\StatusCovid19;

interface StatusCovid19RepositoryInterface
{
	public function getAllStatusCovid19() : array;

	public function findStatusCovid19ById(string $id) : ?StatusCovid19;
}