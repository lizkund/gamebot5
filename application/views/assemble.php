<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * The Assemble Bots Page - first draft
 */
?>

<div id="FinishedProduct">
	<table>
		<tr>
			<td>
				<!--some jQuery should go in here
					display the selected part from corresponding dropdown -->
				<image id="botHead" src="../images/bot/11b-0.jpeg">
			</td>
			<td>
				<p>Top Piece</p>
				<select>
					{topOptions}
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<image id="botBody" src="../images/bot/11b-1.jpeg">
			</td>
			<td>
				<p>Middle Piece</p>
				<select>
					{middleOptions}
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<image id="botLeg" src="../images/bot/11b-2.jpeg" />
			</td>
			<td>
				<p>Bottom Piece</p>
				<select>
					{bottomOptions}
				</select>
			</td>
		</tr>
	</table>

	<!--{BotAssembled}-->
</div>


<div id="Assemble">
	<button type="button">Assemble</button>
</div>
