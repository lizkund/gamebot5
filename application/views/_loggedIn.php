<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Welcome message for logged in users
 */
?>
<div id="logged">
	<div>
		<p class="message">Welcome back, {player}!</p>
		<form method="post">
			<input type="submit" name="logout" value="Logout"/>
		</form>
	</div>
</div>
