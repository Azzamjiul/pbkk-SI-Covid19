<?php

namespace KCV\Dashboard\Presentation\Web\Controller;

use KCV\Dashboard\Core\Application\Service\GetAllHospital\GetAllHospitalService;

class UserQueueController extends BaseController
{
    /**
	 * @var GetAllHospitalService
	 */
    protected $getAllHospitalService;

    public function initialize()
    {
        $this->setAnnouncementView();
		$this->setAuthView();
        
        $this->getAllHospitalService = $this->getDI()->get('getAllHospitalService');
    }

    public function indexAction()
	{
		$hospitals = $this->getAllHospitalService->execute();

        $this->view->setVar('hospitals', $hospitals);
        $this->view->pick('queue');
	}
}