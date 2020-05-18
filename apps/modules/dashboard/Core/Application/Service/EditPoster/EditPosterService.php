<?php

namespace KCV\Dashboard\Core\Application\Service\EditPoster;

use KCV\Dashboard\Core\Domain\Model\Poster;
use KCV\Dashboard\Core\Domain\Repository\PosterRepositoryInterface;

class EditPosterService
{
	protected PosterRepositoryInterface $repository;

	public function __construct(PosterRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute(EditPosterRequest $request)
	{
		try {
			$poster = new Poster(
				$request->getName(),
				$request->getPath(),
				$this->generateTimestamp(),
				$request->getId()
			);

			$this->repository->editPoster($poster);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	private function generateTimestamp()
	{
		return date('Y-m-d H:i:s');
	}
}