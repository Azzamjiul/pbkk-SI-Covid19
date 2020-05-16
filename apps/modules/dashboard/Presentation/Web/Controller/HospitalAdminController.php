<?php

namespace KCV\Dashboard\Presentation\Web\Controller;

use KCV\Dashboard\Core\Application\Service\FindHospital\FindHospitalService;
use KCV\Dashboard\Core\Application\Service\UpdateHospitalQueueStatus\UpdateHospitalQueueStatusService;
use KCV\Dashboard\Core\Application\Service\GetAllUser\GetAllUserService;
use KCV\Dashboard\Core\Application\Service\AddUser\AddUserRequest;
use KCV\Dashboard\Core\Application\Service\AddUser\AddUserService;
use Phalcon\Http\Request;
use Phalcon\Security;

class HospitalAdminController extends BaseController
{
    /**
	 * @var FindHospitalService
	 */
    protected $findHospitalService;

    /**
	 * @var UpdateHospitalQueueStatusService
	 */
    protected $updateHospitalQueueStatusService;

    /**
	 * @var GetAllUserService
	 */
    protected $getAllUserService;
    
    /**
	 * @var AddUserService
	 */
	protected $addUserService;

	public function initialize()
	{
		$this->authorized();
        $this->hasHospitalPrivilege();
        
        $this->findHospitalService = $this->getDI()->get('findHospitalService');
        $this->updateHospitalQueueStatusService = $this->getDI()->get('updateHospitalQueueStatusService');
        $this->getAllUserService = $this->getDI()->get('getAllUserService');
		$this->addUserService = $this->getDI()->get('addUserService');
	}

	public function indexAction()
	{
        try {
            $hospital = $this->findHospitalService->execute($this->session->auth['hospital_id']);
        } catch(\Exception $e) {
            throw $e->getMessage();
        }

        $mydate=getdate(date("U"));

        $this->view->setVar('hospital', $hospital);
        $this->view->setVar('mydate', $mydate);
        
		$this->view->pick('hospital/home');
    }
    
    public function updateHospitalQueueStatusAction()
    {
        // Check request
		if(!$this->request->isPost()) {
			return $this->response->redirect('rumah-sakit');
        }

        $newStatus = $this->request->getPost('newStatus');
        $hospitalId = $this->session->auth['hospital_id'];

		try {
			$this->updateHospitalQueueStatusService->execute($hospitalId, $newStatus);
			$this->flashSession->success('Status Antrean Berhasil Diubah');
			return $this->response->redirect('rumah-sakit');
		} catch (\Exception $e) {
			return $this->response->redirect('rumah-sakit');
		}
    }

    public function adminAction()
    {
        $users = $this->getAllUserService->execute();

		$this->view->setVar('users', $users);
		$this->view->pick('hospital/adminHospital/home');
    }

    public function addAdminAction()
	{
		$this->view->pick('hospital/adminHospital/add');
    }

    public function addAdminSubmitAction()
	{
		// Check request
		if(!$this->request->isPost()) {
			return $this->response->redirect('rumah-sakit/admin/add');
		}

		// Handle request
		$username = $this->request->getPost('username');
		$email = $this->request->getPost('email');
		$password = $this->request->getPost('password');
        $hospitalId = $this->session->auth['hospital_id'];
        $role = 2;

		if($username == '' || $email == '' || $password == '') {
			$this->flashSession->error("Please fulfill with a valid form");
			return $this->response->redirect('rumah-sakit/admin/add');
		}

		// Add new User
		$request = new AddUserRequest($username, $email, $password, $role, $hospitalId);
		try {
			$this->addUserService->execute($request);
			$this->flashSession->success('Admin Rumah Sakit Telah Berhasil Ditambahkan');
			return $this->response->redirect('rumah-sakit/admin');
		} catch (\Exception $e) {
			$this->flashSession->error('Email / Username telah digunakan!');
			return $this->response->redirect('rumah-sakit/admin/add');
		}
    }
}