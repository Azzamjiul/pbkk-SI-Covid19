<?php

namespace KCV\Dashboard\Presentation\Web\Controller;

use KCV\Dashboard\Core\Application\Service\GetAllHospital\GetAllHospitalService;
use KCV\Dashboard\Core\Application\Service\AddHospital\AddHospitalRequest;
use KCV\Dashboard\Core\Application\Service\AddHospital\AddHospitalService;

/**
 * @property \Phalcon\Mvc\Controller
 */
class HospitalController extends BaseController
{
    /**
	 * @var GetAllHospitalService
	 */
	protected $getAllHospitalService;

	/**
	 * @var AddHospitalService
	 */
	protected $addHospitalService;

	public function initialize()
	{
		$this->authorized();
        $this->hasAdminPrivilege();
		$this->getAllHospitalService = $this->getDI()->get('getAllHospitalService');
        $this->addHospitalService = $this->getDI()->get('addHospitalService'); 
	}

	public function indexAction()
	{
		$hospitals = $this->getAllHospitalService->execute();
		
		$this->view->setVar('hospitals', $hospitals);
		$this->view->pick('admin/hospital/home');
	}

	public function addAction()
	{
		$this->setProvinceView();
		$this->view->pick('admin/hospital/add');
	}

	public function addSubmitAction()
	{
		// Check request
		if(!$this->request->isPost()) {
			return $this->response->redirect('admin/rumah-sakit/add');
        }
        
		// Handle request
		$name = $this->request->getPost('name');
		$address = $this->request->getPost('address');
		$districtId = $this->request->getPost('districtId');

		if($name == '' || $address == '' || $districtId =='') {
			$this->flashSession->error("Please fulfill with a valid form");
			return $this->response->redirect('admin/rumah-sakit/add');
		}

		// Add new Rumah Sakit
        $request = new AddHospitalRequest($name, $address, $districtId);
        
		try {
			$this->addHospitalService->execute($request);
			$this->flashSession->success('Rumah sakit baru telah ditambahkan!');
			return $this->response->redirect('/admin/rumah-sakit');
		} catch (\Exception $e) {
			// var_dump($e);
			$this->flashSession->error('Nama rumah sakit telah digunakan');
			return $this->response->redirect('/admin/rumah-sakit/add');
		}  
	}
}