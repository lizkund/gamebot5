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
			{PlayerInfo}
		</tbody>
	</table>
</div>