<?php

namespace KCV\Dashboard\Core\Application\Service\FindPosterById;

class FindPosterByIdRequest
{
	protected $posterId;

	public function __construct($posterId)
	{
		$this->posterId = $posterId;
	}

	public function getPosterId()
	{
		return $this->posterId;
	}
}