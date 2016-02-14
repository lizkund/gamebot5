<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * The Individual Player Page
 */
?>
<div id="playerSelect">
	Select a player to view
	<select onchange="window.location.href = this.value">
		{players}
	</select>
</div>

<div id="avatar">
	<img id="avatarImg" alt="User Avatar" src="{avatar}" />
</div>

<div id="playerDetails">
	<p>Name:  <strong>{playerName}</strong></p>
	<p>Peanuts:  <strong>{peanuts}</strong></p>
</div>

<div id="playerCards">
	<table>
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
	<table>
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