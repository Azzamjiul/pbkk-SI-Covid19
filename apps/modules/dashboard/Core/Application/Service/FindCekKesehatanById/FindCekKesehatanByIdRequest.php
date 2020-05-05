<?php

namespace KCV\Dashboard\Core\Application\Service\FindCekKesehatanById;

class FindCekKesehatanByIdRequest 
{
	protected string $cekId;

	public function __construct(string $cekId) 
	{
		$this->cekId = $cekId;
	}

	public function getCekId() 
	{
		return $this->cekId;
	}
}