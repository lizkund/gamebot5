<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
		
	
	public function index()
	{
		$this->data['pagebody'] = 'home';	// this is the view we want shown
		$this->data['gameStatus'] = "Offline - Currently under development";
		$this->data['playerInfo'] = "";		//calling playerinfo
		$this->data['botPieceSummary'] = $this->parser->parse('_pieceSummary', $this->collections->piece_summary(),true);

		
		$this->render();
	}
}
