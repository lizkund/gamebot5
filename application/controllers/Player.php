<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends Application {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/player
	 * 	- or -
	 * 		http://example.com/index.php/player/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/player/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($player = null)
	{
		if (is_null($player) || $player == "" || !$this->players->exists($player))
		{
			redirect($this->data['appRoot'] . '/');
		}
		$this->data['pageTitle'] = 'Player Portfolios';
		$this->data['pagebody'] = 'player'; // this is the view we want shown
		$this->data['PlayerName'] = $player;
		$this->data['Peanuts'] = $this->players->get_peanuts($player);

		$this->render();
	}

}
