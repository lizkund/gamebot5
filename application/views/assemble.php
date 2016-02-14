<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * The Assemble Bots Page
 */
?>

<div id="FinishedProduct">
	<table>
		<tr>
			<td>
				<image id="topPiece" src="{appRoot}/images/bot/11b-0.jpeg">
			</td>
			<td>
				<p>Top Piece</p>
				<select id="top">
					{topOptions}
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<image id="middlePiece" src="{appRoot}/images/bot/11b-1.jpeg">
			</td>
			<td>
				<p>Middle Piece</p>
				<select id="middle">
					{middleOptions}
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<image id="bottomPiece" src="{appRoot}/images/bot/11b-2.jpeg" />
			</td>
			<td>
				<p>Bottom Piece</p>
				<select id="bottom">
					{bottomOptions}
				</select>
			</td>
		</tr>
	</table>
</div>


<div id="Assemble">
	<button type="button">Assemble</button>
</div>

<div id="assembleResult">
	<span id="result"></span>
</div>