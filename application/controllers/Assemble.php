<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Assemble extends Application {

	// Assemble page where users get to put together pieces of robots
	// There will be three drop down's beside three image's that display
	// selected part of robot
	// first draft

	public function index()
	{
		$this->data['pageTitle'] = 'Assemble Your Bot';
		$this->data['pagebody'] = 'assemble'; // this is the view we want shown 

		$this->render();
	}

}
