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
				<image id="topPiece" src="{appRoot}/images/bot/gen-0.png">
			</td>
			<td class="select">
				<p>Top Piece</p>
				<select id="top">
					<option value="" selected="selected" disabled="disabled">Select a Top Piece</option>
					{topOptions}
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<image id="middlePiece" src="{appRoot}/images/bot/gen-1.png">
			</td>
			<td class="select">
				<p>Middle Piece</p>
				<select id="middle">
					<option value="" selected="selected" disabled="disabled">Select a Middle Piece</option>
					{middleOptions}
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<image id="bottomPiece" src="{appRoot}/images/bot/gen-2.png" />
			</td>
			<td class="select">
				<p>Bottom Piece</p>
				<select id="bottom">
					<option value="" selected="selected" disabled="disabled">Select a Bottom Piece</option>
					{bottomOptions}
				</select>
			</td>
		</tr>
	</table>
</div>


<div id="Assemble">
	<button type="button" disabled="disabled" id="btnAssemble">Assemble</button>
</div>

<div id="assembleResult">
	<span id="result"></span>
</div>