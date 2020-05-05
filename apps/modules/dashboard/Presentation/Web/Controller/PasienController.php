<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

use Kun\Dashboard\Core\Application\Service\AddPasien\AddPasienRequest;
use Kun\Dashboard\Core\Application\Service\AddPasien\AddPasienService;
use Kun\Dashboard\Core\Application\Service\DeletePasien\DeletePasienRequest;
use Kun\Dashboard\Core\Application\Service\DeletePasien\DeletePasienService;
use Kun\Dashboard\Core\Application\Service\EditPasien\EditPasienRequest;
use Kun\Dashboard\Core\Application\Service\EditPasien\EditPasienService;
use Kun\Dashboard\Core\Application\Service\FindPasienById\FindPasienByIdRequest;
use Kun\Dashboard\Core\Application\Service\FindPasienById\FindPasienByIdService;
use Kun\Dashboard\Core\Application\Service\GetAllPasien\GetAllPasienService;

class PasienController extends BaseController
{
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

	public function initialize()
	{
		$this->authorized();
		$this->hasAdminPrivilege();

		$this->addPasienService = $this->getDI()->get('addPasienService');
		$this->getAllPasienService = $this->getDI()->get('getAllPasienService');
		$this->deletePasienService = $this->getDI()->get('deletePasienService');
		$this->findPasienByIdService = $this->getDI()->get('findPasienByIdService');
		$this->editPasienService = $this->getDI()->get('editPasienService');
	}

	public function indexAction()
	{
		$pasiens = $this->getAllPasienService->execute();

		$this->view->setVar('pasiens', $pasiens);
		$this->view->pick('admin/pasien/home');
	}

	public function AddAction()
	{
		$this->setProvinceView();
		$this->setStatusCovid19View();
		$this->view->pick('admin/pasien/add');
	}

	public function AddSubmitAction()
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
				$statusId
			);

			$this->addPasienService->execute($request);

			$this->flashSession->success('Pasien berhasil ditambahkan');
			$this->response->redirect('admin/pasien');
		} catch(\Phalcon\Exception $e) {
			throw $e;
		}
	}

	public function editAction($pasienId)
	{
		$request = new FindPasienByIdRequest($pasienId);

		$pasien = $this->findPasienByIdService->execute($request);

		$this->setProvinceView();
		$this->setStatusCovid19View();
		$this->view->setVar('pasien', $pasien);
		$this->view->pick('admin/pasien/edit');
	}

	public function editSubmitAction($pasienId)
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
				$statusId
			);

			$this->editPasienService->execute($request);

			$this->flashSession->success('Edit data pasien berhasil');
			$this->response->redirect('admin/pasien');
		} catch(\Phalcon\Exception $e) {
			throw $e;
		}
	}

	public function deleteAction()
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

			$this->response->redirect('admin/pasien');
		}
	}
}