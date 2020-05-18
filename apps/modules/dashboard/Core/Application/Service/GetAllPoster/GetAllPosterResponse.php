<?php

namespace KCV\Dashboard\Core\Application\Service\GetAllPoster;

class GetAllPosterResponse
{
	protected $posters;

	public function __construct($posters)
	{
		$this->posters = $posters;
	}

	public function getAllPoster()
	{
		return $this->posters;
	}

	public function getPosters($jml)
	{
		$poster_slice = array_slice($this->posters, 0, $jml);

		return $poster_slice;
	}
}