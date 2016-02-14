<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2013, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller
{

	protected $data = array();   // parameters for view components
	protected $id;  // identifier for our content

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */

	function __construct()
	{
		parent::__construct();
		$this->data = array();
		$this->data['site-title'] = 'GameBots G5: Assignment 1'; // our default title
		$this->errors = array();
		$this->data['pageTitle'] = 'Welcome';   // our default page
		$this->data['appRoot'] = (strlen(dirname($_SERVER['SCRIPT_NAME'])) === 1 ? "" : dirname($_SERVER['SCRIPT_NAME']));
	}

	/**
	 * Render this page
	 */
	function render()
	{
		// This is a workaround to dynamically append a folder name if application is not in root.
		$tempMenu = array();
		foreach ($this->config->item('menu_choices')['menuname'] as $record)
		{
			$record['appRoot'] = $this->data['appRoot'];
			$tempMenu['menuname'][] = $record;
		}

		$this->data['menubar'] = $this->parser->parse('_menubar', $tempMenu, true);
		$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);

		// finally, build the browser page!
		$this->data['data'] = &$this->data;
		$this->parser->parse('_template', $this->data);
	}

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */
