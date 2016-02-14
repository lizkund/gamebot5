<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Login Form
 */
?>
<form class="login">
	<table>
		<tr>
			<td><label for="username">Username:</label></td>
			<td><input type="text" name="username" id="username" class="textbox" maxlength="25" /></td>
			<td><input type="submit" formmethod="POST" value="Login"/></td>
		</tr>
	</table>
</form>