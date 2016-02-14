<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * The Home Page
 */
?>
<div class="content-left">
	<div id="game_status" class="box">
		{gameStatus}
	</div>
	<br/>
	<div id="bot_summary" class="box">
		{BotPieceSummary} 
	</div>
</div>

<div id="bot_summary">
	<table>
		<caption>Bot Piece Summary</caption>
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
		<caption>Player Summary</caption>
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
