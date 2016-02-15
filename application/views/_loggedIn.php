<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Welcome message for logged in users
 */
?>
<div id="logged">
	<p class="message">Welcome back, {player}!</p>
	<form method="POST">
		<input type="submit" name="logout" value="Logout"/>
	</form>
</div>
