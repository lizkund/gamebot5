<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * The Individual Player Page
 */
?>
<div>
	<i>
		Have an account with us already?  Login using the form in the navigation above!<br /><br />
		Forgotten your password?  Contact one of this broker agent's administrator for assistance.<br /><br />
		Otherwise, fill in the registration form below to get started!
	</i>
</div>
<br /><br />
<div id="registration">
	<form method="POST">
		<table>
			<tr>
				<td><label for="regUsername">Username:</label></td>
				<td>
					<input type="text" name="regUsername" id="regUsername" class="textbox" maxlength="25" value="{regUsername}"/>
				</td>
				<td><span class="error">{regUsernameError}</td>
			</tr>
			<tr>
				<td><label for="regPassword">Password:</label></td>
				<td>
					<input type="password" name="regPassword" id="regPassword" class="textbox" value=""/>
				</td>
				<td><span class="error">{regPasswordError}</td>
			</tr>
			<tr>
				<td><label for="regConfirmPassword">Confirm Password:</label></td>
				<td>
					<input type="password" name="regConfirmPassword" id="regConfirmPassword" class="textbox" value=""/>
				</td>
				<td><span class="error">{regPasswordError}</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="regSubmit" id="regSubmit" value="Create Account" />
				</td>
			</tr>
		</table>
	</form>
</div>