<?php

namespace KCV\Dashboard\Presentation\Web\Controller;

use KCV\Dashboard\Core\Application\Service\EditUser\EditUserRequest;
use KCV\Dashboard\Core\Application\Service\EditUser\EditUserService;
use KCV\Dashboard\Core\Application\Service\FindUserById\FindUserByIdRequest;
use KCV\Dashboard\Core\Application\Service\FindUserById\FindUserByIdService;
use KCV\Dashboard\Core\Application\Service\GetAllUser\GetAllUserService;
use KCV\Dashboard\Core\Application\Service\GetAllHospital\GetAllHospitalService;
use KCV\Dashboard\Core\Application\Service\AddUser\AddUserRequest;
use KCV\Dashboard\Core\Application\Service\AddUser\AddUserService;
use Phalcon\Http\Request;
use Phalcon\Security;

class AdminController extends BaseController
{
	/**
	 * @var GetAllUserService
	 */
	protected $getAllUserService;

	/**
	 * @var EditUserService
	 */
	protected $editUserService;

	/**
	 * @var FindUserByIdService
	 */
	protected $findUserByIdService;

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
		$this->editUserService = $this->getDI()->get('editUserService');
		$this->findUserByIdService = $this->getDI()->get('findUserByIdService');
		$this->getAllHospitalService = $this->getDI()->get('getAllHospitalService');
		$this->addUserService = $this->getDI()->get('addUserService');
	}

	public function indexAction()
	{
		$users = $this->getAllUserService->execute();

		$this->view->setVar('users', $users);
		$this->view->pick('admin/home');
	}

	public function editSubmitAction()
	{
		if($this->request->isPost() == true) {
			$userId = $this->request->getPost('userId');
			$username = $this->request->getPost('username');
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');
			$role = $this->request->getPost('role');

			$request = new EditUserRequest($userId, $username, $email, $password, $role);

			$this->editUserService->execute($request);
		}
	}

	public function setAdminAction()
	{
		if($this->request->isPost() == true) {
			$userId = $this->request->getPost('userId');

			$response = $this->findUserByIdService->execute(new FindUserByIdRequest($userId));
			$user = $response->getData();

			$request = new EditUserRequest(
				$userId, 
				$user->getUsername(), 
				$user->getEmail(), 
				$user->getPassword()->toString(),
				1);
			
			$this->editUserService->execute($request);

			$this->response->redirect('admin');
		}
	}

	public function hospitalAdminAction()
    {
        $users = $this->getAllUserService->execute();

		$this->view->setVar('users', $users);
		$this->view->pick('admin/adminHospital/home');
    }

    public function addHospitalAdminAction()
	{
        $hospitals = $this->getAllHospitalService->execute();		
		$this->view->setVar('hospitals', $hospitals);

		$this->view->pick('admin/adminHospital/add');
    }
    
    public function addHospitalAdminSubmitAction()
    {
        // Check request
		if(!$this->request->isPost()) {
			return $this->response->redirect('admin/admin-rumah-sakit/add');
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