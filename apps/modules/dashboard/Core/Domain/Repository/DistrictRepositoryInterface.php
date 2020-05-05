<?php

namespace Kun\Dashboard\Core\Domain\Repository;

interface DistrictRepositoryInterface 
{
	public function getDistricts($regencyId) : array;
}