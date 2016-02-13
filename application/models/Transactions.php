<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Data access wrapper for "orders" table.
 *
 * @author jim
 */
class Transactions extends MY_Model2 {

	// constructor
	function __construct()
	{
		parent::__construct('transactions', 'datetime', 'player');
	}

}
