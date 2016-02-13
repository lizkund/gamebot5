<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Data access wrapper for "orders" table.
 *
 * @author jim
 */
class Collections extends MY_Model {

	// constructor
	function __construct() {
		parent::__construct('collections', 'token', 'piece');
	}

	function piece_summary($player = null) {
		$result = array();
		if (is_null($player) || $player == "") {
			$result = $this->all();
		} else {
			$result = $this->some('Player', $player);
		}

		$pieces = array();
		foreach ($result as $record) {
			if (array_key_exists($record->Piece, $pieces)) {
				// key exists, add 1 count to it.
				$pieces[$record->Piece] ++;
			} else {
				// new key and first count of bot piece
				$pieces[$record->Piece] = 1;
			}
		}
		ksort($pieces, SORT_NATURAL | SORT_FLAG_CASE);

		$summary = array();
		foreach ($pieces as $piece => $count) {
			$summary[] = array(
				'Series' => substr($piece, 0, 2),
				'BotType' => substr($piece, 2, 1),
				'BotPart' => substr($piece, -1, 1),
				'Quantity' => $count
			);
		}

		foreach ($summary as $num => $row) {
			switch ($row['BotPart']) {
				case "0":
					$summary[$num]['BotPart'] = "Head";
					break;
				case "1":
					$summary[$num]['BotPart'] = "Body";
					break;
				case "2":
					$summary[$num]['BotPart'] = "Legs";
					break;
			}
		}
		$table['collection'] = $summary;

		return $table;
	}

}
