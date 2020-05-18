<?php

namespace KCV\Dashboard\Core\Application\Service\FindPosterById;

use KCV\Dashboard\Core\Domain\Repository\PosterRepositoryInterface;

class FindPosterByIdService
{
	protected PosterRepositoryInterface $repository;

	public function __construct(PosterRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute(FindPosterByIdRequest $request)
	{
		try {
			$posterId = $request->getPosterId();
			$poster = $this->repository->findPosterById($posterId);

			if(!isset($poster)) {
				throw new \Exception('Poster not found');
			}
		} catch(\Exception $e) {
			throw $e;
		}

		return $poster;
	}
}