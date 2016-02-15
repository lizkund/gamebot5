<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * The Individual Player Page
 */
?>
<div id="playerSelect">
	Currently viewing player details for: 
	<select onchange="window.location.href = this.value">
		{players}
	</select>
	Select another player to view their details
</div>
<div class="center">
	<div class="contentleft">
		<div id="avatar">
			<img id="avatarImg" alt="User Avatar" src="{avatar}" />
		</div>
		<div id="playerDetails">
			<p><label>Name:</label>  <strong>{playerName}</strong></p>
			<p><label>Peanuts:</label>  <strong>{peanuts}</strong></p>
		</div>
	</div>
	<div class="content-right">
		<div id="playerCards">
			<table class="responstable">
				<caption>Player Card Collection</caption>
				<thead>
					<tr>
						<th>Bot Series</th>
						<th>Bot Type</th>
						<th>Bot Part</th>
						<th>Card Quantity</th>
					</tr>
				</thead>
				<tbody>
					{playerCards}
				</tbody>
			</table>
		</div>

		<div id="latestActivity">
			<table class="responstable">
				<caption>Player Transaction History</caption>
				<thead>
					<tr>
						<th>Date &amp; Time</th>
						<th>Type</th>
						<th>Peanuts</th>
						<th>Transaction</th>
					</tr>
				</thead>
				<tbody>
					{playerLatestActivity}
				</tbody>
			</table>
		</div>
	</div>
</div>