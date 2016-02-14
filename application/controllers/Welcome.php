<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 * 	- or -
	 * 		http://example.com/index.php/welcome/index
	 * 	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$this->data['pagebody'] = 'home'; // this is the view we want shown
		$this->data['gameStatus'] = "Offline - Currently under development";
		$this->data['playerInfo'] = "";  //calling playerinfo
		//
		// Get the bot piece summary
		$table = $this->series->all();

		$series = array();
		foreach ($table as $type) {
			$row = array(
				'Series' => $type->Series,
				'Description' => $type->Description,
				'Frequency' => $type->Frequency,
				'Value' => $type->Value,
				'Quantity' => 0
			);
			$series[] = $row;
		}

		// Get all cards in db
		$cards = $this->collections->all();
		foreach ($cards as $card) 
		{
			$key = array_search(substr($card->Piece, 0, 2), array_column($series, 'Series'));
			$series[$key]['Quantity'] ++;
		}

		$summary['collection'] = $series;

		$this->data['botPieceSummary'] = $this->parser->parse('_pieceSummary', $summary, true);

		$this->render();
	}

}
