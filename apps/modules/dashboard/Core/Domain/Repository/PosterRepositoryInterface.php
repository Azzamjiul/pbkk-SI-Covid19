<?php

namespace KCV\Dashboard\Core\Domain\Repository;

use KCV\Dashboard\Core\Domain\Model\Poster;

interface PosterRepositoryInterface
{
	public function addPoster(Poster $poster);

	public function getAllPoster() : array;

	public function findPosterById($id) : ?Poster;

	public function editPoster(Poster $poster);

	public function deletePoster($id);
}