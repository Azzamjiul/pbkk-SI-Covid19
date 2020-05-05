<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

use Kun\Dashboard\Core\Application\Service\EditUser\EditUserRequest;
use Kun\Dashboard\Core\Application\Service\EditUser\EditUserService;
use Kun\Dashboard\Core\Application\Service\FindUserById\FindUserByIdRequest;
use Kun\Dashboard\Core\Application\Service\FindUserById\FindUserByIdService;
use Kun\Dashboard\Core\Application\Service\GetAllUser\GetAllUserService;

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

	public function initialize()
	{
		$this->authorized();
		$this->hasAdminPrivilege();

		$this->getAllUserService = $this->getDI()->get('getAllUserService');
		$this->editUserService = $this->getDI()->get('editUserService');
		$this->findUserByIdService = $this->getDI()->get('findUserByIdService');
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
}