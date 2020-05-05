<?php

namespace KCV\Dashboard\Core\Application\Service\GetRegencies;

class GetRegenciesRequest
{
	protected string $provinceId;

	public function __construct(string $provinceId)
	{
		$this->provinceId = $provinceId;
	}

	public function getProvinceId()
	{
		return $this->provinceId;
	}
}