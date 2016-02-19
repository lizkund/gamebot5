<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 */
class Application extends CI_Controller {

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

		// our default title
		$this->data['site-title'] = 'GameBots G5: Assignment 1';

		$this->errors = array();

		// our default page
		$this->data['pageTitle'] = 'Welcome';

		// For debugging purposes only.
		$this->data['debug'] = "";

		// This special line of code will check if the application is running in a folder or not
		// i.e.:  gamebot5.local will not return anything, whereas localhost/gamebot5 will return /gamebot5
		$this->data['appRoot'] = (strlen(dirname($_SERVER['SCRIPT_NAME'])) === 1 ? "" : dirname($_SERVER['SCRIPT_NAME']));

		/**
		 * Add in additional CSS files used by using:
		 * 
		 * 		$this->pageStyles[] = 'string';
		 * 
		 * in the INDIVIDUAL controllers.
		 * 
		 * You can specify:
		 * 	local css files (in the css folder) by just the filename WITHOUT the .css extension
		 * 	CDN Hotlinks by the full url (including http)
		 */
		// Set global styles to load on all pages
		$this->pageStyles = array('button', 'smartphone', 'style', 'tablet', 'table');

		/**
		 * Add in additional JS files used by using
		 * 
		 * 		$this->pageScripts[] = 'string';
		 * 
		 * You can specify:
		 * 	local js files (in the js folder) by just the filename WITHOUT the .js extension
		 * 	CDN Hotlinks by the full url (including http)
		 */
		// set global scripts to load on all pages
		$this->pageScripts = array('https://code.jquery.com/jquery-2.2.0.min.js');

		// Check if user is logged in or not, and display according login/logout part
		$this->userSession();
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
		$tempMenu['userSession'] = $this->data['userSession'];

		// Parse and return the html string of the links for menubar navigation
		$this->data['menubar'] = $this->parser->parse('_menubar', $tempMenu, true);

		// CI Parser to insert into template
		$this->data['loadScripts'] = "";

		// Check if we need to load any JavaScript files
		if (!empty($this->pageScripts))
		{
			// at least one value was provided to the pageScripts array
			// Make sure only unique values are in the array
			$this->pageScripts = array_unique($this->pageScripts);
			$scripts = array();
			foreach ($this->pageScripts as $js)
			{
				// Check if the value is a local file or a hotlink
				if (strpos($js, "http") === false)
				{
					// Did not detect http, therefore it's a local file (hopefully)
					// NOTE:  We aren't checking for file existence
					$temp['link'] = $this->data['appRoot'] . "/assets/js/" . $js . ".js";
				} else
				{
					// Detected http, attempt to validate link via PHP Validation
					if (filter_var($js, FILTER_VALIDATE_URL))
					{
						// Link validated by PHP
						$temp['link'] = $js;
					} else
					{
						// Invalid Link... Do nothing.
					}
				}
				// Add into the proper array for CI Parsing
				$scripts['scripts'][] = $temp;
			}

			// Parse and return html string
			$this->data['loadScripts'] = $this->parser->parse('__js', $scripts, true);
		}

		// CI Parser to insert into template
		$this->data['loadStyles'] = "";

		// Check if we need to load any CSS files
		if (!empty($this->pageStyles))
		{
			// at least one value was provided to the pageStyles array
			// Make sure only unique values are in the array
			$this->pageStyles = array_unique($this->pageStyles);
			$styles = array();
			foreach ($this->pageStyles as $css)
			{
				// check if the value is a local file or a hotlink
				if (strpos($css, "http") === false)
				{
					// Did not detect http, therefore it's a local file (hopefully)
					// NOTE:  We aren't checking for file existence
					$temp['link'] = $this->data['appRoot'] . "/assets/css/" . $css . ".css";
				} else
				{
					// Detected http, attempt to validate link via PHP Validation
					if (filter_var($css, FILTER_VALIDATE_URL))
					{
						// Link validated by PHP
						$temp['link'] = $css;
					} else
					{
						// Invalid Link... Do nothing.
					}
				}

				// Add into proper array for CI Parsing
				$styles['styles'][] = $temp;
			}

			// Parse and return html string
			$this->data['loadStyles'] = $this->parser->parse('__css', $styles, true);
		}

		$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
		// finally, build the browser page!
		$this->data['data'] = &$this->data;
		$this->parser->parse('_template', $this->data);
	}

	function userSession()
	{
		$display = $this->load->view('_loginForm', '', true);
		if (is_null($this->session->username))
		{
			// No username set in session
			if (!is_null($this->input->post('login')))
			{
				// login button clicked
				$username = ucwords(strtolower(str_replace(" ", "", $this->input->post('username'))));
				if ($username != "" && !is_null($username))
				{
					$this->session->username = $username;
					$player['player'] = $this->session->username;
					if (!$this->players->exists($username))
					{
						$this->players->add(array(
							"Player" => $this->session->username)
						);
					}
					$display = $this->parser->parse('_loggedIn', $player, true);
				}
			}
		} else
		{
			// Username in session
			if (!is_null($this->input->post('logout')))
			{
				// logout button clicked
				$this->session->sess_destroy();
				redirect($_SERVER['REQUEST_URI']);
			} else
			{
				// User still logged in.
				$player['player'] = $this->session->username;
				$display = $this->parser->parse('_loggedIn', $player, true);
			}
		}

		// Send for CI parsing!
		$this->data['userSession'] = $display;
	}

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */
