<?php

namespace KCV\Common\Controller;

use Phalcon\Mvc\Controller;

class ErrorController extends Controller
{
	public function initialize()
	{

	}

	public function route404Action()
	{
		$this->view->pick('404');
	}

	public function route403Action()
	{
		$this->view->pick('403');
	}

	public function maintenanceAction()
	{

	}
}