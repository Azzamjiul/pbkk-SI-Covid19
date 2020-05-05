<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

use Kun\Dashboard\Core\Application\Service\AddCekKesehatan\AddCekKesehatanRequest;
use Kun\Dashboard\Core\Application\Service\AddCekKesehatan\AddCekKesehatanService;
use Kun\Dashboard\Core\Application\Service\EditCekKesehatan\EditCekKesehatanRequest;
use Kun\Dashboard\Core\Application\Service\EditCekKesehatan\EditCekKesehatanService;
use Kun\Dashboard\Core\Application\Service\FindCekKesehatanById\FindCekKesehatanByIdRequest;
use Kun\Dashboard\Core\Application\Service\FindCekKesehatanById\FindCekKesehatanByIdService;
use Kun\Dashboard\Core\Application\Service\GetAllCekKesehatan\GetAllCekKesehatanService;

class CekKesehatanController extends BaseController
{
	/**
	 * @var AddCekKesehatanService
	 */
	protected $addCekKesehatanService;

	/**
	 * @var GetAllCekKesehatanService
	 */
	protected $getAllCekKesehatanService;

	/**
	 * @var FindCekKesehatanByIdService
	 */
	protected $findCekKesehatanByIdService;

	/**
	 * @var EditCekKesehatanService
	 */
	protected $editCekKesehatanService;

	public function initialize()
	{
		$this->setAnnouncementView();
		$this->setAuthView();

		$this->addCekKesehatanService = $this->getDI()->get('addCekKesehatanService');
		$this->getAllCekKesehatanService = $this->getDI()->get('getAllCekKesehatanService');
		$this->findCekKesehatanByIdService = $this->getDI()->get('findCekKesehatanByIdService');
		$this->editCekKesehatanService = $this->getDI()->get('editCekKesehatanService');
	}

	public function indexAction()
	{
		$this->authorized();

		$this->dispatcher->forward([
			'controller' => 'cekKesehatan',
			'action' => 'add'
		]);
		return;
	}

	public function adminIndexAction()
	{
		$this->authorized();
		$this->hasAdminPrivilege();

		$ceks = $this->getAllCekKesehatanService->execute();

		$this->view->setVar('ceks', $ceks);
		$this->view->pick('admin/cek/home');
	}

	public function addAction()
	{
		$this->view->pick('cek/add');
	}

	public function addSubmitAction()
	{
		if($this->request->isPost()) {
			$userId = $this->request->getPost('userId');
			$suhuTubuh = $this->request->getPost('suhuTubuh');
			$frekuensiNapas = $this->request->getPost('frekuensiNapas');
			$gejalaLain = $this->request->getPost('gejalaLain');
			$riwayatPerjalanan = $this->request->getPost('riwayatPerjalanan');
	
			$request = new AddCekKesehatanRequest(
				$userId,
				$suhuTubuh,
				$frekuensiNapas,
				$gejalaLain,
				$riwayatPerjalanan
			);
	
			$this->addCekKesehatanService->execute($request);
	
			$this->flashSession->success('Form pengecekan berhasil dikirim, mohon tunggu maks. 1x24 jam');
			$this->response->redirect('/');
		}
	}

	public function editAction($cekId)
	{
		$request = new FindCekKesehatanByIdRequest($cekId);

		$cek = $this->findCekKesehatanByIdService->execute($request);

		$this->view->setVar('cek', $cek);
		$this->view->pick('admin/cek/edit');
	}

	public function editSubmitAction($cekId)
	{
		$isChecked = 1;
		$hasil = $this->request->getPost('hasil');

		try {
			$request = new EditCekKesehatanRequest($cekId, $hasil, $isChecked);

			$this->editCekKesehatanService->execute($request);

			$this->flashSession->success('Update data pengecekan berhasil');
			$this->response->redirect('admin/cek-kesehatan');
		} catch (\Exception $e) {
			throw $e;
		}
	}
}