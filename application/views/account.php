<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * The Individual Player Page
 */
?>
<div id="accountInfo">

	<table>
		<tr>
			<td>Player Name / Username:</td>
			<td><b>{username}</b></td>
		</tr>
		<tr>
			<td>Account Role:</td>
			<td><b>{role}</b></td>
		</tr>
		<tr>
			<td>Date Registered:</td>
			<td><b>{dateRegistered}</b></td>
		</tr>
		<tr>
			<td>Password Last Updated:</td>
			<td><b>{lastUpdated}</b></td>
		</tr>
	</table>
	<form method="post">
		<fieldset>
			<legend>Password Change</legend>
			<table>
				<tr>
					<td>Current Password</td>
					<td><input type="password" name="curPassword" id="curPassword" class="textbox" /></td>
					<td><span class="error">{curPasswordError}</td>
				</tr>
				<tr>
					<td>New Password</td>
					<td><input type="password" name="newPassword" id="newPassword" class="textbox" /></td>
					<td><span class="error">{newPasswordError}</td>
				</tr>
				<tr>
					<td>Confirm New Password</td>
					<td><input type="password" name="newConfirmPassword" id="newConfirmPassword" class="textbox" /></td>
					<td><span class="error">{newPasswordError}</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="pwSubmit" id="pwSubmit" value="Change Password" /></td>
				</tr>
			</table>
		</fieldset>
	</form>
</div>