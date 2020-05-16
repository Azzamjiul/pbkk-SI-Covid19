<?php

namespace KCV\Dashboard\Presentation\Web\Controller;

use KCV\Dashboard\Core\Application\Service\FindHospital\FindHospitalService;
// use KCV\Dashboard\Core\Application\Service\UpdateHospitalQueueStatus\UpdateHospitalQueueStatusService;

class HospitalAdminController extends BaseController
{
    /**
	 * @var FindHospitalService
	 */
    protected $findHospitalService;

    /**
	 * @var UpdateHospitalQueueStatusService
	 */
    // protected $updateHospitalQueueStatusService;

	public function initialize()
	{
		$this->authorized();
        $this->hasHospitalPrivilege();
        
        $this->findHospitalService = $this->getDI()->get('findHospitalService');
        // $this->updateHospitalQueueStatusService = $this->getDI()->get('updateHospitalQueueStatusService');
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
			return $this->response->redirect('hospital');
        }

        $newStatus = $this->request->getPost('newStatus');
        $hospitalId = $this->session->auth['hospitalId'];

		try {
			$this->updateHospitalQueueStatusService->execute($hospitalId, $newStatus);
			$this->flashSession->success('Status Antrean Berhasil Diubah');
			return $this->response->redirect('hospital');
		} catch (\Exception $e) {
			return $this->response->redirect('hospital');
		}
    }
}