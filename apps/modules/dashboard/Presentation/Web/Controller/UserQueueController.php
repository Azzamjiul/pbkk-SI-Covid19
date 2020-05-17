<?php

namespace KCV\Dashboard\Presentation\Web\Controller;

use KCV\Dashboard\Core\Application\Service\GetAllHospital\GetAllHospitalService;
use KCV\Dashboard\Core\Application\Service\AddQueue\AddQueueService;

class UserQueueController extends BaseController
{
    /**
	 * @var GetAllHospitalService
	 */
    protected $getAllHospitalService;

    /**
	 * @var GetAllHospitalService
	 */
    protected $addQueueService;

    public function initialize()
    {
        $this->setAnnouncementView();
		$this->setAuthView();
        
        $this->getAllHospitalService = $this->getDI()->get('getAllHospitalService');
        $this->addQueueService = $this->getDI()->get('addQueueService');
    }

    public function indexAction()
	{
		$hospitals = $this->getAllHospitalService->execute();

        $this->view->setVar('hospitals', $hospitals);
        $this->view->pick('queue');
    }
    
    public function getQueueAction()
    {
        // Check request
		if(!$this->request->isPost()) {
			return $this->response->redirect('antre');
        }
        
		// Handle request
        $hospital_id = $this->request->getPost('hospital_id');
		$user_id = $this->session->auth['id'];

		if($hospital_id == '') {
			$this->flashSession->error("Gagal Mengambil Antrean");
			return $this->response->redirect('antre');
		}

		// Add new Queue
		try {
			$this->addQueueService->execute($hospital_id, $user_id);
            $this->flashSession->success("Antrean Berhasil Diambil");
            $this->session->auth['queue_status'] = 1;
			$this->response->redirect('antre');
		} catch (\Exception $e) {
			$this->flashSession->error("Antrean Telah Ditutup / Penuh");
			return $this->response->redirect('antre');
		}
    }
}