<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * The Glorious Template
 */
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>{pageTitle} | {site-title}</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="shortcut icon" type="image/ico" href="{appRoot}/assets/images/favicon.ico" />
		{loadStyles}
	</head>
	<body>
		<header>
			<div id='header-in'>
				<a href="{appRoot}/">
					<img src="{appRoot}/assets/images/banner.png" alt="Site Banner Image"/>
				</a>
			</div>
		</header>
		<nav id='navigation'>
			{menubar}
		</nav>
		<div id="container">
			<div id="content">
				{debug}
				<div id='content-in'>
					{content}
				</div>
			</div>
		</div>
		<footer>
			<p id='footer-in'>Copyright &copy; 2016 <strong>Group 5 - Assignment 1</strong></p>
		</footer>
		{loadScripts}
	</body>
</html>
