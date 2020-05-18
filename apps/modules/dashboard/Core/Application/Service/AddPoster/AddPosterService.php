<?php

namespace KCV\Dashboard\Core\Application\Service\AddPoster;

use KCV\Dashboard\Core\Domain\Model\Poster;
use KCV\Dashboard\Core\Domain\Repository\PosterRepositoryInterface;

class AddPosterService
{
	protected PosterRepositoryInterface $repository;

	public function __construct(PosterRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute(AddPosterRequest $request)
	{
		try {
			$poster = new Poster(
				$request->getName(),
				$request->getPath(),
				$this->generateTimestamp()
			);

			$result = $this->repository->addPoster($poster);

			if(!$result) {
				throw new \Exception('Gagal menambahkan poster');
			}
		} catch(\Exception $e) {
			throw $e;
		}
	}

	private function generateTimestamp()
	{
		return date('Y-m-d H:i:s');
	}
}