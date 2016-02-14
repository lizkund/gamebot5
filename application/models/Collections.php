<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Data access wrapper for "Collections" table.
 *
 */
class Collections extends MY_Model {

	// constructor
	function __construct() {
		parent::__construct('collections', 'token', 'piece');
	}
}
