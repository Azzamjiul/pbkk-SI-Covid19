<?php

namespace Kun\Dashboard\Core\Domain\Repository;

interface RegencyRepositoryInterface 
{
	public function getRegencies($provinceId) : array;
}