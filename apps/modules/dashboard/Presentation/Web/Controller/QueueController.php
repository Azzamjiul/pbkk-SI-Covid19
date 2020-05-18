<?php

namespace KCV\Dashboard\Presentation\Web\Controller;

use KCV\Dashboard\Core\Application\Service\GetNumberQueue\GetNumberQueueService;

/**
 * @property \Phalcon\Mvc\Controller
 */
class QueueController extends BaseController
{
    /**
	 * @var AddPosterService
	 */
    protected $getNumberQueueService;
    
	public function initialize()
	{
		$this->getNumberQueueService = $this->getDI()->get('getNumberQueueService');
	}
	public function getNumberAction($hospital_id)
	{
        $jumlah = $this->getNumberQueueService->execute($hospital_id);

        return $jumlah;
    }
    
    public function getNumberUserAction($user_id)
	{

	}

	public function backAction()
	{
		
    }
    
    public function nextAction()
    {

    }
}