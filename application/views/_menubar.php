<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Menu navbar, just an unordered list
 */
?>
<ul>
	{menuname}
	<li><a href="{appRoot}{link}">{name}</a></li>
	{/menuname}
	
	{userSession}
</ul>

