<?php

namespace KCV\Dashboard\Presentation\Web\Controller;

use KCV\Dashboard\Core\Application\Service\GetAllUser\GetAllUserService;
use KCV\Dashboard\Core\Application\Service\GetAllHospital\GetAllHospitalService;
use KCV\Dashboard\Core\Application\Service\AddUser\AddUserRequest;
use KCV\Dashboard\Core\Application\Service\AddUser\AddUserService;
use Phalcon\Http\Request;
use Phalcon\Security;


class HospitalAdminController extends BaseController
{
    /**
	 * @var GetAllUserService
	 */
    protected $getAllUserService;
    
    /**
	 * @var GetAllHospitalService
	 */
    protected $getAllHospitalService;
    
    /**
	 * @var AddUserService
	 */
	protected $addUserService;

	public function initialize()
	{
        $this->authorized();
        $this->hasAdminPrivilege();
        
        $this->getAllUserService = $this->getDI()->get('getAllUserService');
        $this->getAllHospitalService = $this->getDI()->get('getAllHospitalService');
		$this->addUserService = $this->getDI()->get('addUserService');
    }
    
    public function indexAction()
    {
        $users = $this->getAllUserService->execute();

		$this->view->setVar('users', $users);
		$this->view->pick('admin/adminHospital/home');
    }

    public function addAction()
	{
        $hospitals = $this->getAllHospitalService->execute();		
		$this->view->setVar('hospitals', $hospitals);

		$this->view->pick('admin/adminHospital/add');
    }
    
    public function addSubmitAction()
    {
        // Check request
		if(!$this->request->isPost()) {
			return $this->response->redirect('register');
		}

		// Handle request
		$username = $this->request->getPost('username');
		$email = $this->request->getPost('email');
		$password = $this->request->getPost('password');
        $hospitalId = $this->request->getPost('hospitalId');
        $role = 2;

		if($username == '' || $email == '' || $password == '' || $hospitalId =='') {
			$this->flashSession->error("Please fulfill with a valid form");
			return $this->response->redirect('admin/admin-rumah-sakit/add');
		}

		// Add new User
		$request = new AddUserRequest($username, $email, $password, $role, $hospitalId);
		try {
			$this->addUserService->execute($request);
			$this->flashSession->success('Admin Rumah Sakit Telah Berhasil Ditambahkan');
			return $this->response->redirect('admin/admin-rumah-sakit');
		} catch (\Exception $e) {
			$this->flashSession->error('Email / Username telah digunakan!');
			return $this->response->redirect('admin/admin-rumah-sakit/add');
		}
    }
}