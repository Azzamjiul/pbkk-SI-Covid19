<?php

namespace KCV\Dashboard\Core\Application\Service\GetAllPoster;

use KCV\Dashboard\Core\Domain\Repository\PosterRepositoryInterface;

class GetAllPosterService
{
	protected PosterRepositoryInterface $repository;

	public function __construct(PosterRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute()
	{
		try {
			$posters = $this->repository->getAllPoster();
		} catch(\Exception $e) {
			throw $e;
		}

		return new GetAllPosterResponse($posters);
	}
}