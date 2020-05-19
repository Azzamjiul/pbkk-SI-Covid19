<?php

namespace KCV\Dashboard\Presentation\Web\Controller;

use DateTime;
use KCV\Dashboard\Core\Application\Service\GetAllPoster\GetAllPosterService;
use KCV\Dashboard\Core\Application\Service\GetCountKasus\GetCountKasusResponse;
use KCV\Dashboard\Core\Application\Service\GetCountKasus\GetCountKasusService;
use KCV\Dashboard\Core\Application\Service\GetCountKasusByPlace\GetCountKasusByPlaceService;

class IndexController extends BaseController
{
	/**
	 * @var GetCountKasusService
	 */
	protected $getCountKasusService;

	/**
	 * @var GetCountKasusByPlaceService
	 */
	protected $getCountKasusByPlaceService;

	/**
	 * @var GetAllPosterService
	 */
	protected $getAllPosterService;

	public function initialize()
	{
		$this->setAnnouncementView();
		$this->setAuthView();
		$this->setCekKesehatanView();

		$this->getCountKasusService = $this->getDI()->get('getCountKasusService');
		$this->getCountKasusByPlaceService = $this->getDI()->get('getCountKasusByPlaceService');

		$this->getAllPosterService = $this->getDI()->get('getAllPosterService');
	}

	public function indexAction()
	{
		/**
		 * @var GetCountKasusResponse
		 */
		$response = $this->getCountKasusService->execute();

		$countByCategory = $response->getAllKasusByNama();

		$countPositifOnly = $response->getAllKasusPositif();

		$countByPlace = $this->getCountKasusByPlaceService->execute();

		$postersResponse = $this->getAllPosterService->execute();
		$posters = $postersResponse->getAllPoster();

		$this->view->setVar('posters', $posters);
		$this->view->setVar('kasus', $countPositifOnly);
		$this->view->setVar('jumlah', $countByCategory);
		$this->view->setVar('tables', $countByPlace);
		$this->view->pick('home');
	}

}