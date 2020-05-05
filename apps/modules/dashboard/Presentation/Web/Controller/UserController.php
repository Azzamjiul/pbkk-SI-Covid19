<?php

namespace KCV\Dashboard\Presentation\Web\Controller;

use KCV\Dashboard\Core\Application\Service\AddUser\AddUserRequest;
use KCV\Dashboard\Core\Application\Service\AddUser\AddUserService;
use KCV\Dashboard\Core\Application\Service\FindUserById\FindUserByIdRequest;
use KCV\Dashboard\Core\Application\Service\FindUserById\FindUserByIdService;
use KCV\Dashboard\Core\Application\Service\GetAllProvince\GetAllProvinceService;

class UserController extends BaseController
{
	protected FindUserByIdService $findUserByIdService;

	protected AddUserService $addUserService;

	protected GetAllProvinceService $getAllProvinceService;

	public function initialize() 
	{
		$this->setAnnouncementView();
		$this->setAuthView();

		$this->findUserByIdService = $this->getDI()->get('findUserByIdService');
		$this->addUserService = $this->getDI()->get('addUserService');
		$this->getAllProvinceService = $this->getDI()->get('getAllProvinceService');
	}

	public function indexAction()
	{
		$this->authorized();

		return $this->view->pick('/');
	}

	public function addAction()
	{
		$username = $this->request->getPost('username');
		$email = $this->request->getPost('email');
		$password = $this->request->getPost('password');
		$role = $this->request->getPost('role');

		$request = new AddUserRequest($username, $email, $password, $role);
		try {
			$this->addUserService->execute($request);
			var_dump('ok');
		} catch (\Exception $e) {
			var_dump($e->getMessage());
		}
	}

	public function editAction($userId)
	{
		$this->authorized();

		$request = new FindUserByIdRequest($userId);
		$response = $this->findUserByIdService->execute($request);

		$user = $response->getData();

		$provinces = $this->getAllProvinceService->execute();

		$this->view->setVar('provinces', $provinces);
		$this->view->setVar('user', $user);
		$this->view->pick('user/view');
	}

	public function editSubmitAction()
	{

	}

	public function removeAction()
	{

	}
}