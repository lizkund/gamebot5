<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends Application {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/account
	 * 	- or -
	 * 		http://example.com/index.php/account/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/player/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($action = 'info')
	{
		// Check if username exist
		if (!is_null($this->session->username))
		{
			// Username exists; user logged in
			$name = $this->session->username;
		}

		$this->data['pageTitle'] = ''; // Page Title
		$this->data['pagebody'] = 'register'; // this is the view we want shown
		$this->data['regUsernameError'] = "";
		$this->data['regPasswordError'] = "";

		switch ($action)
		{
			case 'login':
				if (!empty($name))
				{
					// User is logged in already.  Redirect to main account page
					redirect("/account");
				}
				$this->data['pageTitle'] = 'Login';
				$this->data['staticMessage'] = "Use the login form in the navigation section to login.";
				break;
			case 'register':
				if (!empty($name))
				{
					// Player already logged in.
					redirect("/account");
				}

				//  At this point Not Logged In
				$this->data['pageTitle'] = 'Player Account Info';
				if (!is_null($this->input->post('regSubmit')))
				{
					// Create New Account button clicked
					$valid = true;
					$regUsername = strtolower($this->input->post('regUsername'));
					$this->session->regUsername = $regUsername;
					$this->data['regUsername'] = $this->session->regUsername;
					$regPassword = $this->input->post('regPassword');
					$regConfirmPassword = $this->input->post('regConfirmPassword');

					// Check Username
					if (is_null($regUsername) || empty($regUsername))
					{
						// No value found for username
						$valid = false;
						$this->data['regUsernameError'] = "Username is required.";
					} else
					{
						// check if username already exists
						if ($this->players->exists($regUsername))
						{
							// Username already exist in database
							$valid = false;
							$this->data['regUsernameError'] = "Username already taken by someone else.";
						}
					}

					// Check Password
					if (is_null($regPassword) || empty($regPassword) || is_null($regConfirmPassword) || empty($regConfirmPassword))
					{
						// at least one password field is empty
						$valid = false;
						$this->data['regPasswordError'] = "Both password fields are required.";
					}

					// Confirm both passwords match
					if ($regPassword !== $regConfirmPassword)
					{
						$valid = false;
						$this->data['regPasswordError'] = "Passwords entered do not match.";
					}

					if ($valid)
					{
						$newPlayer = array(
							'Player'	 => $regUsername,
							'Password'	 => password_hash($regPassword, PASSWORD_DEFAULT)
						);
						$this->players->add($newPlayer);
						$this->data['pageTitle'] = "Player Registration Complete";
						$this->session->loginMessage = "Player Registration values have passed validation!";
						$this->data['staticMessage'] = "Congratulations!  Your account has been created with the username [ " . $regUsername . " ].  Simply login above to get started.";
					}
				} else
				{
					$this->data['pageTitle'] = 'New Player Registration';
					$this->data['pagebody'] = 'register';
				}
				break;
			case 'info':
				$this->data['pageTitle'] = "Player Account Info";
				$this->data['newPasswordError'] = "";
				$this->data['curPasswordError'] = "";
				if (isset($name))
				{
					// logged in
					if (!is_null($this->input->post('pwSubmit')))
					{
						// Change Password Button clicked
						$valid = true;
						$curPassword = $this->input->post('curPassword');

						// Check Password
						if (is_null($curPassword) || empty($curPassword))
						{
							// current password field is empty
							$valid = false;
							$this->data['curPasswordError'] = "Your current password is required.";
						} else
						{
							// current passwored field has a value
							$player = $this->players->get(strtolower($name));
							if (password_verify($curPassword, $player->Password))
							{
								// Current password matches
								$newPassword = $this->input->post('newPassword');
								$newConfirmPassword = $this->input->post('newConfirmPassword');
								if (is_null($newPassword) || empty($newPassword) || is_null($newConfirmPassword) || empty($newConfirmPassword))
								{
									// at least one password field is empty
									$valid = false;
									$this->data['newPasswordError'] = "Both password fields are required.";
								}

								// Confirm both new passwords match
								if ($newPassword !== $newConfirmPassword)
								{
									// New Passwords do not match
									$valid = false;
									$this->data['newPasswordError'] = "Passwords entered do not match.";
								}
							} else
							{
								// current password doesn't match
								$valid = false;
								$this->data['curPasswordError'] = "Current password is not correct.";
							}
						}

						if ($valid)
						{
							$updatePlayer = array(
								'Player'	 => strtolower($name),
								'Password'	 => password_hash($newPassword, PASSWORD_DEFAULT)
							);
							$this->players->update($updatePlayer);
							$this->data['pageTitle'] = "Password Change Successful!";
							$this->session->loginMessage = "Player password changed!";
							$this->data['staticMessage'] = "Congratulations, " . $name . "!  Your account password has been successfully changed.  ";
						}
					}
					// Get Player Data
					$player = $this->players->get($name);
					$this->data['username'] = $player->Player;
					$this->data['role'] = ($player->AccessLevel == 99 ? "Admin" : "Player");
					$this->data['dateRegistered'] = $player->DateRegistered;
					$this->data['lastUpdated'] = ($player->LastUpdated == $player->DateRegistered ? "Never" : $player->LastUpdated);
					$this->data['pagebody'] = "account";
				} else
				{
					// not logged in
					$this->session->loginMessage = "Invalid session.  Please try again.";
					$this->data['staticMessage'] = "Viewing or Modifiying your account information requires you to be logged in first!";
				}
				break;
			default:
				redirect("/account");
				break;
		}

		// Render Page!
		$this->render();
	}

}
