<?php

namespace KCV\Dashboard\Presentation\Web\Controller;

use KCV\Dashboard\Core\Application\Service\FindHospital\FindHospitalService;
use KCV\Dashboard\Core\Application\Service\UpdateHospitalQueueStatus\UpdateHospitalQueueStatusService;
use KCV\Dashboard\Core\Application\Service\GetAllUser\GetAllUserService;
use KCV\Dashboard\Core\Application\Service\AddUser\AddUserRequest;
use KCV\Dashboard\Core\Application\Service\AddUser\AddUserService;
use KCV\Dashboard\Core\Application\Service\GetAllPasien\GetAllPasienService;
use KCV\Dashboard\Core\Application\Service\AddPasien\AddPasienService;
use KCV\Dashboard\Core\Application\Service\AddPasien\AddPasienRequest;
use KCV\Dashboard\Core\Application\Service\DeletePasien\DeletePasienRequest;
use KCV\Dashboard\Core\Application\Service\DeletePasien\DeletePasienService;
use KCV\Dashboard\Core\Application\Service\EditPasien\EditPasienRequest;
use KCV\Dashboard\Core\Application\Service\EditPasien\EditPasienService;
use KCV\Dashboard\Core\Application\Service\FindPasienById\FindPasienByIdRequest;
use KCV\Dashboard\Core\Application\Service\FindPasienById\FindPasienByIdService;
use KCV\Dashboard\Core\Application\Service\GetAllQueue\GetAllQueueService;
use KCV\Dashboard\Core\Application\Service\EditHospital\EditHospitalService;
use KCV\Dashboard\Core\Application\Service\EditHospital\EditHospitalRequest;
use KCV\Dashboard\Core\Application\Service\NextQueue\NextQueueService;
use KCV\Dashboard\Core\Application\Service\BackQueue\BackQueueService;
use KCV\Dashboard\Core\Application\Service\GetNumberUserQueue\GetNumberUserQueueService;
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

	/**
	 * @var AddPasienService
	 */
	protected $addPasienService;

	/**
	 * @var GetAllPasienService
	 */
	protected $getAllPasienService;

	/**
	 * @var FindPasienByIdService
	 */
	protected $findPasienByIdService;

	/**
	 * @var DeletePasienService
	 */
	protected $deletePasienService;

	/**
	 * @var EditPasienService
	 */
	protected $editPasienService;

	/**
	 * @var GetAllQueueService
	 */
	protected $getAllQueueService;

	/**
	 * @var NextQueueService
	 */
	protected $editHospitalService;

	/**
	 * @var BackQueueService
	 */
	protected $nextQueueService;

	/**
	 * @var EditHospitalService
	 */
	protected $backQueueService;

	/**
	 * @var GetNumberUserQueueService
	 */
	protected $getNumberUserQueueService;

	public function initialize()
	{
		$this->authorized();
		$this->hasHospitalPrivilege();
		$this->setAuthView();
        
        $this->findHospitalService = $this->getDI()->get('findHospitalService');
        $this->updateHospitalQueueStatusService = $this->getDI()->get('updateHospitalQueueStatusService');
        $this->getAllUserService = $this->getDI()->get('getAllUserService');
		$this->addUserService = $this->getDI()->get('addUserService');
		$this->addPasienService = $this->getDI()->get('addPasienService');
		$this->getAllPasienService = $this->getDI()->get('getAllPasienService');
		$this->deletePasienService = $this->getDI()->get('deletePasienService');
		$this->findPasienByIdService = $this->getDI()->get('findPasienByIdService');
		$this->editPasienService = $this->getDI()->get('editPasienService');
		$this->getAllQueueService = $this->getDI()->get('getAllQueueService');
		$this->editHospitalService = $this->getDI()->get('editHospitalService');
		$this->nextQueueService = $this->getDI()->get('nextQueueService');
		$this->backQueueService = $this->getDI()->get('backQueueService');
		$this->getNumberUserQueueService = $this->getDI()->get('getNumberUserQueueService');
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

		$this->dispatcher->forward(
			[
				'controller' => 'queue',
				'action' => 'getNumber',
				'params' => [
						$this->session->auth['hospital_id']
					]
			]
		);
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

	// pasien function
	
	public function PasienAction()
	{
		$pasiens = $this->getAllPasienService->execute();
		$hospital_id = $this->session->auth['hospital_id'];

		$this->view->setVar('pasiens', $pasiens);
		$this->view->setVar('hospital_id', $hospital_id);

		$this->view->pick('hospital/pasien/home');
	}

	public function AddPasienAction()
	{
		$this->setProvinceView();
		$this->setStatusCovid19View();
		$this->view->pick('hospital/pasien/add');
	}

	public function AddPasienSubmitAction()
	{
		$namaLengkap = $this->request->getPost('namaLengkap');
		$districtId = $this->request->getPost('districtId');
		$alamat = $this->request->getPost('alamat');
		$jenisKelamin = $this->request->getPost('jenisKelamin');
		$tinggiBadan = $this->request->getPost('tinggiBadan');
		$beratBadan = $this->request->getPost('beratBadan');
		$tekananDarah = $this->request->getPost('tekananDarah');
		$jenisPenyakit = $this->request->getPost('jenisPenyakit');
		$riwayatPenyakit = $this->request->getPost('riwayatPenyakit');
		$alergi = $this->request->getPost('alergi');
		$statusId = $this->request->getPost('statusId');
		$hospital_id = $this->session->auth['hospital_id'];

		// TODO: add handler
		try {
			$request = new AddPasienRequest(
				$namaLengkap,
				$districtId,
				$alamat,
				$jenisKelamin,
				$tinggiBadan,
				$beratBadan,
				$tekananDarah,
				$jenisPenyakit,
				$riwayatPenyakit,
				$alergi,
				$statusId,
				$hospital_id
			);

			$this->addPasienService->execute($request);

			$this->flashSession->success('Pasien berhasil ditambahkan');
			$this->response->redirect('rumah-sakit/pasien');
		} catch(\Phalcon\Exception $e) {
			throw $e;
		}
	}

	public function editPasienAction($pasienId)
	{
		$request = new FindPasienByIdRequest($pasienId);

		$pasien = $this->findPasienByIdService->execute($request);

		$this->setProvinceView();
		$this->setStatusCovid19View();
		$this->view->setVar('pasien', $pasien);
		$this->view->pick('hospital/pasien/edit');
	}

	public function editPasienSubmitAction($pasienId)
	{
		$namaLengkap = $this->request->getPost('namaLengkap');
		$districtId = $this->request->getPost('districtId');
		$alamat = $this->request->getPost('alamat');
		$jenisKelamin = $this->request->getPost('jenisKelamin');
		$tinggiBadan = $this->request->getPost('tinggiBadan');
		$beratBadan = $this->request->getPost('beratBadan');
		$tekananDarah = $this->request->getPost('tekananDarah');
		$jenisPenyakit = $this->request->getPost('jenisPenyakit');
		$riwayatPenyakit = $this->request->getPost('riwayatPenyakit');
		$alergi = $this->request->getPost('alergi');
		$statusId = $this->request->getPost('statusId');
		$hospital_id = $this->session->auth['hospital_id'];

		// TODO: add handler
		try {
			$request = new EditPasienRequest(
				$pasienId,
				$namaLengkap,
				$districtId,
				$alamat,
				$jenisKelamin,
				$tinggiBadan,
				$beratBadan,
				$tekananDarah,
				$jenisPenyakit,
				$riwayatPenyakit,
				$alergi,
				$statusId,
				$hospital_id
			);

			$this->editPasienService->execute($request);

			$this->flashSession->success('Edit data pasien berhasil');
			$this->response->redirect('rumah-sakit/pasien');
		} catch(\Phalcon\Exception $e) {
			throw $e;
		}
	}

	public function deletePasienAction()
	{
		if($this->request->isPost()) {
			try {
				$id = $this->request->getPost('id');

				$request = new DeletePasienRequest($id);
				$this->deletePasienService->execute($request);
	
				$this->flashSession->success('Hapus data pasien berhasil');
			} catch(\Exception $e) {
				$this->flashSession->error('Gagal menghapus data pasien');
			}

			$this->response->redirect('rumah-sakit/pasien');
		}
	}

	public function queueListAction()
	{
		$queues = $this->getAllQueueService->execute();
		$users = $this->getAllUserService->execute();

		$this->view->setVar('users', $users);
		$this->view->setVar('queues', $queues);

		$this->view->pick('hospital/pengantre/home');
	}

	public function hospitalProfileAction()
	{
		$this->setProvinceView();

		try {
            $hospital = $this->findHospitalService->execute($this->session->auth['hospital_id']);
        } catch(\Exception $e) {
            throw $e->getMessage();
        }

        $this->view->setVar('hospital', $hospital);

		$this->view->pick('hospital/profile/home');
	}

	public function hospitalProfileSubmitAction()
	{
		// Check request
		if(!$this->request->isPost()) {
			return $this->response->redirect('rumah-sakit/profil');
		}

		$name = $this->request->getPost('name');
		$district_id = $this->request->getPost('district_id');
		$address = $this->request->getPost('address');
		$quota = $this->request->getPost('quota');
		$filled = $this->request->getPost('filled');
		$doctor_number = $this->request->getPost('doctor_number');
		$nurse_number = $this->request->getPost('nurse_number');
		$personnel_number = $this->request->getPost('personnel_number');
		$hospital_id = $this->session->auth['hospital_id'];

		// TODO: add handler
		try {
			$request = new EditHospitalRequest(
				$name,
				$district_id,
				$address,
				$quota,
				$filled,
				$doctor_number,
				$nurse_number,
				$personnel_number,
				$hospital_id
			);

			$this->editHospitalService->execute($request);

			$this->flashSession->success('Edit data rumah sakit berhasil');
			$this->response->redirect('rumah-sakit/profil');
		} catch(\Phalcon\Exception $e) {
			throw $e;
		}
	}

	public function nextQueueAction()
	{
		$this->nextQueueService->execute($this->session->auth['hospital_id']);
		$this->response->redirect('rumah-sakit');
	}

	public function backQueueAction()
	{
		$this->backQueueService->execute($this->session->auth['hospital_id']);
		$this->response->redirect('rumah-sakit');
	}
}