<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * A quick login display for those not logged in.
 */
?>
<div id="login">
	<form id="user_login">
		<label for="username">Username:</label>
		<input type="text" name="username" id="username" class="textbox" maxlength="25" />
		<br />
		<!--
		This is in preparation for a Password Field.
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" class="textbox" maxlength="25" />
		<br />
		--> 
		<input type="submit" value="Login">
	</form>
</div>