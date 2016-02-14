<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Assemble extends Application {

	// Assemble page where users get to put together pieces of robots
	// There will be three drop down's beside three image's that display
	// selected part of robot
	// first draft

	public function index() {
		$this->data['pageTitle'] = 'Assemble Your Bot';
		$this->data['pagebody'] = 'assemble'; // this is the view we want shown 

		$player = "George";

		$playerCollection = $this->collections->some('Player', $player);
		$dropdowns = array();
		foreach ($playerCollection as $row) {
			$piece = $row->Piece;
			$series = substr($piece, 0, 2);
			$type = strtoupper(substr($piece, 2, 1));
			$part = substr($piece, -1, 1);
			$opt = "Series " . $series . " Type " . $type;
			switch ($part) {
				case 0:
					$dropdowns['top'][] = array(
						'opt' => $opt . " (TOP)",
						'value' => $piece);
					break;
				case 1:
					$dropdowns['middle'][] = array(
						'opt' => $opt . " (MIDDLE)",
						'value' => $piece);
					break;
				case 2:
					$dropdowns['bottom'][] = array(
						'opt' => $opt . " (BOTTOM)",
						'value' => $piece);
					break;
			}
		}
		
		$options = array();
		$options['top']['options'] = $dropdowns['top'];
		$options['middle']['options'] = $dropdowns['middle'];
		$options['bottom']['options'] = $dropdowns['bottom'];

		$this->data['topOptions'] = $this->parser->parse('_assembleOption1', $options['top'], true);
		$this->data['middleOptions'] = $this->parser->parse('_assembleOption1', $options['middle'], true);
		$this->data['bottomOptions'] = $this->parser->parse('_assembleOption1', $options['bottom'], true);
		
		$this->pageScripts[] = "Assemble";
		$this->data['pageScripts'] = $this->parser->parse('_js', $script, true);

		$this->render();
	}

}
