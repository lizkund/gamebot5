<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * The Home Page
 */
?>
<div class="content-left">
	<div id="game_status" class="box">
		<h3>Game Status</h3>
		{gameStatus}
	</div>
	<br/>
	<div id="bot_summary" class="box">
		<h3>Bot Piece Summary</h3>
		<table class="responstable">
			<thead>
				<tr>
					<th>Bot Series</th>
					<th>Description</th>
					<th>Frequency</th>
					<th>Value <br/>(in Peanuts)</th>
					<th>Bot Pieces</th>
				<tr>
			</thead>
			<tbody>
				{botPieceSummary}
			</tbody>
		</table>
	</div>
</div>

<div id="player_info">
	<h3>Player Summary</h3>
	<table class="responstable">
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
