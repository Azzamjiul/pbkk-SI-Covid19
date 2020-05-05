<?php

namespace KCV\Dashboard\Core\Domain\Repository;

interface DistrictRepositoryInterface 
{
	public function getDistricts($regencyId) : array;
}