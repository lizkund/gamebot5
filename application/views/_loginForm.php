<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * A quick login display for those not logged in.
 */
?>
<p class="message">You are not logged in.<br/>Enter a <b>username</b> to login or register</p>
<table id="login">
	<tr>
		<td><label for="username">Username:</label></td>
		<td><input type="text" name="username" id="username" class="textbox" maxlength="25" /></td>
		<td><input type="submit" formmethod="POST" value="Login"/></td>
	</tr>
</table>
<!--
This is in preparation for a Password Field.
<label for="password">Password:</label>
<input type="password" name="password" id="password" class="textbox" maxlength="25" />
<br />
--> 