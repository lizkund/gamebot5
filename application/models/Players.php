<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Data access wrapper for "orders" table.
 *
 * @author jim
 */
class Players extends MY_Model {

	// constructor
	function __construct()
	{
		parent::__construct('players', 'Player');
	}

	// add player to an order

	function add_player($name)
	{
		
	}

	// get peanut amount of player
	function get_peanuts($name = null)
	{
		// Name is set, grab that player's peanut count
		return $this->get($name)->Peanuts;
	}

}
