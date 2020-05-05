<?php

namespace KCV\Dashboard\Presentation\Web\Controller;

use KCV\Dashboard\Core\Application\Service\GetAllProvince\GetAllProvinceService;
use KCV\Dashboard\Core\Application\Service\GetDistricts\GetDistrictsRequest;
use KCV\Dashboard\Core\Application\Service\GetDistricts\GetDistrictsService;
use KCV\Dashboard\Core\Application\Service\GetRegencies\GetRegenciesRequest;
use KCV\Dashboard\Core\Application\Service\GetRegencies\GetRegenciesService;

class AddressController extends BaseController
{
	/**
	 * @var GetAllProvinceService
	 */
	protected $getAllProvinceService;

	/**
	 * @var GetRegenciesService
	 */
	protected $getRegenciesService;

	/**
	 * @var GetDistrictsService
	 */
	protected $getDistrictsService;

	public function initialize()
	{
		$this->getAllProvinceService = $this->getDI()->get('getAllProvinceService');
		$this->getRegenciesService = $this->getDI()->get('getRegenciesService');
		$this->getDistrictsService = $this->getDI()->get('getDistrictsService');
	}

	public function getAllProvinceAction()
	{
		try {
			$provinces = $this->getAllProvinceService->execute();
		} catch(\Exception $e) {
			throw $e->getMessage();
		}

		var_dump($provinces);
	}

	public function getRegenciesAction()
	{
		if($this->request->isPost() == true) {
			if(true) {
				$provinceId = $this->request->getPost('provinceId');

				$request = new GetRegenciesRequest($provinceId);

				try {
					$regencies = $this->getRegenciesService->execute($request);
				} catch(\Exception $e) {
					throw $e;
				}

				echo json_encode($regencies);
			}
		}
	}

	public function getDistrictsAction()
	{
		if($this->request->isPost() == true) {
			if(true) {
				$regencyId = $this->request->getPost('regencyId');

				$request = new GetDistrictsRequest($regencyId);

				try {
					$districts = $this->getDistrictsService->execute($request);
				} catch(\Exception $e) {
					throw $e;
				}

				echo json_encode($districts);
			}
		}
	}
}