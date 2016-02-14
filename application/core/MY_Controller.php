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
			$this->login();
		}

		$this->data['menubar'] = $this->parser->parse('_menubar', $tempMenu, true);
		$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);

		// finally, build the browser page!
		$this->data['data'] = &$this->data;
		$this->parser->parse('_template', $this->data);
	}

	/**
	 * Function that will handle login
	 */
	function login()
	{
		// display no message if there's nothing to say
		$this->data['message'] = NULL;

		//Get data from user forms
		$username = $this->input->get_post('username');
		$useraction = $this->input->get_post('action');

		if ($this->session->userdata('username') && $useraction === 'logout')
		{
//			If user is logged and logs out, remove the session data.
			$this->session->unset_userdata('username');
			$this->data['message'] = 'Logged out successfully!';
		} else if (!empty($username) && $useraction === 'login')
		{
//			Username field is filled check if that username exists, check the players
			$this->load->model('players');
			if ($username === $this->players->get(array('player' => $username))['player'])
			{
//				If the username is valid...store session data.
				$this->session->set_userdata(array('username' => $username));
				$this->data['message'] = 'You are now logged in!';
			} else
			{
//				If the username is not valid...
				$this->data['message'] = 'The usename is not valid!';
			}
		} else if (empty($username) && $useraction === 'login')
		{
//				If the form field is empty but tries to click on login...
			$this->data['message'] = 'Please type in your user name.';
		}
	}

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */
