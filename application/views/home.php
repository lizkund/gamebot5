<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * The Home Page
 */
?><div id="game_status">
	{gameStatus}
</div>

<div id="bot_summary">
	<table>
		<thead>
			<tr>
				<th>Bot Series</th>
				<th>Description</th>
				<th>Frequency</th>
				<th>Value (in Peanuts)</th>
				<th>Bot Pieces</th>
			<tr>
		</thead>
		<tbody>
			{botPieceSummary}
		</tbody>
	</table>
</div>

<div id="player_info">
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Peanuts</th>
				<th>Equity</th>
			<tr>
		</thead>
		<tbody>
			{playerInfo}
		</tbody>
	</table>
</div>
