<?php

namespace Kun\Dashboard\Core\Application\Service\GetDistricts;

class GetDistrictsRequest
{
	protected string $regencyId;

	public function __construct(string $regencyId)
	{
		$this->regencyId = $regencyId;
	}

	public function getRegencyId()
	{
		return $this->regencyId;
	}
}