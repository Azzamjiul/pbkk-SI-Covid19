<?php

namespace KCV\Dashboard\Presentation\Web\Controller;

use KCV\Dashboard\Core\Application\Service\AddPoster\AddPosterService;
use KCV\Dashboard\Core\Application\Service\GetAllPoster\GetAllPosterService;

/**
 * @property \Phalcon\Mvc\Controller
 */
class PosterController extends BaseController
{
	/**
	 * @var AddPosterService
	 */
	protected $addPosterService;

	/**
	 * @var GetAllPosterService
	 */
	protected $getAllPosterService;

	public function initialize()
	{
		$this->authorized();
		$this->hasAdminPrivilege();
		$this->addPosterService = $this->getDI()->get('addPosterService');
		$this->getAllPosterService = $this->getDI()->get('getAllPosterService');
	}

	public function indexAction()
	{
		$posters = $this->getAllPosterService->execute();

		$this->view->setVar('posters', $posters);
		$this->view->pick('admin/poster/home');
	}

	public function addAction()
	{
		$this->view->pick('admin/poster/add');
	}

	public function addSubmitAction()
	{
		
	}
}