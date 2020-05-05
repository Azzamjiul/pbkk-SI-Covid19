<?php

namespace KCV\Dashboard\Presentation\Web\Controller;

use KCV\Dashboard\Core\Application\Service\AddUser\AddUserRequest;
use KCV\Dashboard\Core\Application\Service\AddUser\AddUserService;
use KCV\Dashboard\Core\Application\Service\LoginUser\LoginUserRequest;
use KCV\Dashboard\Core\Application\Service\LoginUser\LoginUserService;
use Phalcon\Http\Request;
use Phalcon\Security;

/**
 * @property Request $request
 * @property Security $security
 */
class AuthController extends BaseController
{
	/**
	 * @var LoginUserService
	 */
	protected $loginUserService;

	/**
	 * @var AddUserService
	 */
	protected $addUserService;

	public function initialize()
	{
		$this->loginUserService = $this->getDI()->get('loginUserService');
		$this->addUserService = $this->getDI()->get('addUserService');
	}

	public function indexAction()
	{
		var_dump($this->session);

	}

	public function registerAction()
	{
		// $this->response->redirect('login');
		$this->view->pick('auth/register');
	}

	public function registerSubmitAction()
	{
		// Check request
		if(!$this->request->isPost()) {
			return $this->response->redirect('register');
		}

		// https://docs.phalcon.io/4.0/en/security
		// Validate CSRF Token
		if(!$this->security->checkToken()) {
			$this->flashSession->error("Invalid Token");
			return $this->response->redirect('register');
		}

		// Handle request
		$username = $this->request->getPost('username');
		$email = $this->request->getPost('email');
		$password = $this->request->getPost('password');

		if($username == '' || $email == '' || $password == '') {
			$this->flashSession->error("Please fulfill with a valid form");
			return $this->response->redirect('register');
		}

		// Add new User
		$request = new AddUserRequest($username, $email, $password);
		try {
			$this->addUserService->execute($request);
			$this->flashSession->success('Thanks for registering!');
			return $this->response->redirect('login');
		} catch (\Exception $e) {
			$this->flashSession->error('Email / Username telah digunakan!');
			return $this->response->redirect('register');
		}
	}

	public function loginAction()
	{
		$this->hasLoggedIn();

		$this->view->pick('auth/login');
	}

	public function loginSubmitAction()
	{
		// Check request
		if(!$this->request->isPost()) {
			return $this->response->redirect('login');
		}

		// https://docs.phalcon.io/4.0/en/security
		// Validate CSRF Token
		if(!$this->security->checkToken()) {
			$this->flashSession->error("Invalid Token");
			return $this->response->redirect('login');
		}

		// Handle request
		$keyValue = $this->request->getPost('keyValue');
		$password = $this->request->getPost('password');

		$request = new LoginUserRequest($keyValue, $password);
		try {
			$response = $this->loginUserService->execute($request);
			$user = $response->getData();

			$this->session->set('auth', array(
				'id' => $user->getUserId()->id(),
				'username' => $user->getUsername(),
				'email' => $user->getEmail(),
				'role' => $user->getRole()
			));

			$this->response->redirect('/');
			$this->view->disable();
		} catch (\Exception $e) {
			$this->flashSession->error("Invalid Username / Password");
			return $this->response->redirect('login');
		}
	}

	public function logoutAction()
	{
		// https://docs.phalcon.io/4.0/en/security
		// Validate CSRF Token
		if(true || $this->security->checkToken()) {
			$this->session->destroy();
			$this->session->start();
			$this->flashSession->success("Logout berhasil");
		} else {
			$this->flashSession->error("Logout Gagal");
		}

		$this->response->redirect('/');
	}
}