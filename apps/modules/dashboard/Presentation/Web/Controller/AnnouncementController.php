<?php

namespace KCV\Dashboard\Presentation\Web\Controller;

use KCV\Dashboard\Core\Application\Service\AddAnnouncement\AddAnnouncementRequest;
use KCV\Dashboard\Core\Application\Service\AddAnnouncement\AddAnnouncementService;
use KCV\Dashboard\Core\Application\Service\GetAllAnnouncement\GetAllAnnouncementService;

/**
 * @property \Phalcon\Mvc\Controller
 */
class AnnouncementController extends BaseController
{
	/**
	 * @var AddAnnouncementService
	 */
	protected $addAnnouncementService;

	/**
	 * @var GetAllAnnouncementService
	 */
	protected $getAllAnnouncementService;

	public function initialize()
	{
		$this->authorized();
		$this->hasAdminPrivilege();
		$this->addAnnouncementService = $this->getDI()->get('addAnnouncementService');
		$this->getAllAnnouncementService = $this->getDI()->get('getAllAnnouncementService');
	}

	public function indexAction()
	{
		$announcements = $this->getAllAnnouncementService->execute();

		$this->view->setVar('announcements', $announcements);
		$this->view->pick('admin/announcement/home');
	}

	public function addAction()
	{
		$this->view->pick('admin/announcement/add');
	}

	public function addSubmitAction()
	{
		$title = $this->request->getPost('title');
		$content = $this->request->getPost('content');

		if($title == '' || $content == '') {
			throw new \Exception("Unable to add announcement");
		}

		try {
			$request = new AddAnnouncementRequest($title, $content);
			$this->addAnnouncementService->execute($request);
			
			$this->flashSession->success('Pengumuman baru berhasil ditambahkan');
			$this->response->redirect('admin/pengumuman');
		} catch(\Exception $e) {
			var_dump($e->getMessage());
		}
	}
}