<?php

namespace KCV\Dashboard\Presentation\Web\Controller;

use KCV\Dashboard\Core\Application\Service\GetAllHospital\GetAllHospitalService;

/**
 * @property \Phalcon\Mvc\Controller
 */
class HospitalController extends BaseController
{
    /**
	 * @var GetAllHospitalService
	 */
	protected $getAllHospitalService;

	public function initialize()
	{
		$this->authorized();
        $this->hasAdminPrivilege();
		$this->getAllHospitalService = $this->getDI()->get('getAllHospitalService');
	}

	public function indexAction()
	{
		$hospitals = $this->getAllHospitalService->execute();

		$this->view->setVar('hospitals', $hospitals);
		$this->view->pick('admin/hospital/home');
	}

	// public function addAction()
	// {
	// 	$this->view->pick('admin/announcement/add');
	// }

	// public function addSubmitAction()
	// {
	// 	$title = $this->request->getPost('title');
	// 	$content = $this->request->getPost('content');

	// 	if($title == '' || $content == '') {
	// 		throw new \Exception("Unable to add announcement");
	// 	}

	// 	try {
	// 		$request = new AddAnnouncementRequest($title, $content);
	// 		$this->addAnnouncementService->execute($request);
			
	// 		$this->flashSession->success('Pengumuman baru berhasil ditambahkan');
	// 		$this->response->redirect('admin/pengumuman');
	// 	} catch(\Exception $e) {
	// 		var_dump($e->getMessage());
	// 	}
	// }
}