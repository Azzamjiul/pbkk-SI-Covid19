<?php

namespace KCV\Dashboard\Presentation\Web\Controller;

use DateTime;
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

	public function initialize()
	{
		$this->setAnnouncementView();
		$this->setAuthView();
		$this->setCekKesehatanView();

		$this->getCountKasusService = $this->getDI()->get('getCountKasusService');
		$this->getCountKasusByPlaceService = $this->getDI()->get('getCountKasusByPlaceService');
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

		$this->view->setVar('kasus', $countPositifOnly);
		$this->view->setVar('jumlah', $countByCategory);
		$this->view->setVar('tables', $countByPlace);
		$this->view->pick('home');
	}

}