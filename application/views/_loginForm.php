<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * A quick login display for those not logged in.
 */
?>
		<label for="username">Username:</label>
		<input type="text" name="username" id="username" class="textbox" maxlength="25" />
		<input type="submit" formmethod="POST" value="Login"/>
		<!--
		This is in preparation for a Password Field.
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" class="textbox" maxlength="25" />
		<br />
		--> 