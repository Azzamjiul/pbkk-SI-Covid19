<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

use Kun\Dashboard\Core\Application\Service\FindCekKesehatanById\FindCekKesehatanByIdRequest;
use Kun\Dashboard\Core\Application\Service\FindCekKesehatanById\FindCekKesehatanByIdService;
use Kun\Dashboard\Core\Application\Service\GetAllProvince\GetAllProvinceService;
use Kun\Dashboard\Core\Application\Service\GetAllStatusCovid19\GetAllStatusCovid19Service;
use Kun\Dashboard\Core\Application\Service\GetLastAnnouncement\GetLastAnnouncementService;
use Phalcon\Mvc\Controller;

class BaseController extends Controller
{
	protected function setAnnouncementView()
	{
		/**
		 * @var GetLastAnnouncementService
		 */
		$getLastAnnouncementService = $this->getDI()->get('getLastAnnouncementService');

		$announcement = $getLastAnnouncementService->execute();

		$this->view->setVar('announcement', $announcement);
	}

	protected function setProvinceView()
	{
		/**
		 * @var GetAllProvinceService
		 */
		$getAllProvinceService = $this->getDI()->get('getAllProvinceService');

		$provinces = $getAllProvinceService->execute();

		$this->view->setVar('provinces', $provinces);
	}

	protected function setStatusCovid19View()
	{
		/**
		 * @var GetAllStatusCovid19Service
		 */
		$getAllStatusCovid19 = $this->getDI()->get('getAllStatusCovid19Service');

		$status = $getAllStatusCovid19->execute();

		$this->view->setVar('statusCovids', $status);
	}

	protected function setCekKesehatanView()
	{
		if($this->isLoggedIn()) {
			$auth = $this->session->get('auth');
			
			/**
			 * @var FindCekKesehatanByIdService
			 */
			$findCekKesehatanByIdService = $this->getDI()->get('findCekKesehatanByIdService');

			$request = new FindCekKesehatanByIdRequest($auth['id']);
			$cek = $findCekKesehatanByIdService->execute($request);

			$this->view->setVar('cek', $cek);
		}
	}

	protected function setAuthView()
	{
		if($this->isLoggedIn()) {
			$auth = $this->session->get('auth');
			$this->view->setVar('auth', $auth);
		}
	}

	public function authorized()
	{
		if(!$this->isLoggedIn()) {
			return $this->response->redirect('login');
		}

		$this->setAuthView();
	}

	public function hasLoggedIn()
	{
 		if($this->isLoggedIn()) {
			return $this->response->redirect('/');
		}
	}

	public function hasAdminPrivilege()
	{
		if($this->isLoggedIn()) {
			$auth = $this->session->get('auth');

			if($auth['role'] != 1) {
				$this->response->redirect('/');
			}
		}
	}

	private function isLoggedIn()
	{
		if($this->session->has('auth')) {
			return true;
		}

		return false;
	}
}