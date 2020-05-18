<?php

namespace KCV\Dashboard\Presentation\Web\Controller;

use KCV\Dashboard\Core\Application\Service\AddPoster\AddPosterRequest;
use KCV\Dashboard\Core\Application\Service\AddPoster\AddPosterService;
use KCV\Dashboard\Core\Application\Service\FindPosterById\FindPosterByIdRequest;
use KCV\Dashboard\Core\Application\Service\FindPosterById\FindPosterByIdService;
use KCV\Dashboard\Core\Application\Service\GetAllPoster\GetAllPosterResponse;
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

	/**
	 * @var FindPosterByIdService
	 */
	protected $findPosterByIdService;

	public function initialize()
	{
		$this->authorized();
		$this->hasAdminPrivilege();
		$this->addPosterService = $this->getDI()->get('addPosterService');
		$this->getAllPosterService = $this->getDI()->get('getAllPosterService');
		$this->findPosterByIdService = $this->getDI()->get('findPosterByIdService');
	}

	public function indexAction()
	{
		/** @var GetAllPosterResponse */
		$response = $this->getAllPosterService->execute();

		$posters = $response->getAllPoster();

		$this->view->setVar('posters', $posters);
		$this->view->pick('admin/poster/home');
	}

	public function addAction()
	{
		$this->view->pick('admin/poster/add');
	}

	public function addSubmitAction()
	{
		if($this->request->isPost() == true) {
			try {
				$files = $this->request->getUploadedFiles();
				/**@var \Phalcon\Http\Request\File */
				$file = $files[0];
	
				$name = $this->request->get('name');

				$uniqueName = time() . '-' . $file->getName();
				$absolutePath = BASE_PATH . '/public/storage/';
				$savePath = $absolutePath . $uniqueName;
	
				$name = $this->request->get('name');
				$path = $uniqueName;
	
				$request = new AddPosterRequest($name, $path);
	
				$this->addPosterService->execute($request);
				$file->moveTo($savePath);

				$this->flashSession->success('Poster berhasil ditambahkan');
				$this->response->redirect('admin/poster');
			} catch(\Exception $e) {
				throw $e;
			}
		}
	}

	public function editAction($posterId)
	{
		$request = new FindPosterByIdRequest($posterId);

		$poster = $this->findPosterByIdService->execute($request);

		$this->view->setVar('poster', $poster);
		$this->view->pick('admin/poster/edit');
	}
}