<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends Application {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/player
	 * 	- or -
	 * 		http://example.com/index.php/player/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/player/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($name = 'unregistered')
	{
		if (is_null($name) || $name == "" || !$this->players->exists($name))
		{
			//redirect($this->data['appRoot'] . '/');
		}
		$this->data['pageTitle'] = 'Player Portfolios';
		$this->data['pagebody'] = 'player'; // this is the view we want shown

		$this->data['playerName'] = $name;
		$this->data['players'] = $this->parser->parse('_playerSelect1', $this->getPlayers(), true);
		$this->data['avatar'] = $this->getAvatar($name);
		$this->data['peanuts'] = $this->getPeanuts($name);
		$this->data['playerCards'] = $this->parser->parse('_playerCard1', $this->getPlayerCollection($name), true);
		$this->data['playerLatestActivity'] = $this->parser->parse('_transactions', $this->getLatestActivity($name), true);

		$this->render();
	}

	function getPlayers()
	{

		$tablePlayers = $this->players->all();

		$options = array();
		foreach ($tablePlayers as $player)
		{
			$options[]['player'] = $player->Player;
		}

		$players['options'] = $options;

		return $players;
	}

	function getAvatar($name = null)
	{
//		if (is_null($name) || $name == "" || !$this->players->exists($name))
//		{
//			// Unregistered user
//			return $this->data['appRoot'] . "/images/bot/generic_photo.png";
//		} else
//		{
//			// Name is given and exists, grab that player's peanut count
//			return $this->players->get($name)->Avatar;
//		}
		return $this->data['appRoot'] . "/images/generic_photo.png";
	}

	function getPeanuts($name = null)
	{
		if (is_null($name) || $name == "" || !$this->players->exists($name))
		{
			// Unregistered user
			return "0";
		} else
		{
			// Name is given and exists, grab that player's peanut count
			return $this->players->get($name)->Peanuts;
		}
	}

	function getPlayerCollection($name = null)
	{
		if (is_null($name) || $name == "" || !$this->players->exists($name))
		{
			// Unregistered user
			return "N/A";
		} else
		{
			// Name is given and exists, grab that player's card collection
			$tableCollections = $this->collections->some('Player', $name);
			$collection = array();
			foreach ($tableCollections as $type)
			{
				$collection[] = $type->Piece;
			}

			$partCount = array_count_values($collection);
			ksort($partCount);

			$cardList = array();
			foreach ($partCount as $key => $value)
			{
				$row['Series'] = substr($key, 0, 2);
				$row['Type'] = substr($key, 2, 1);
				switch (substr($key, -1, 1))
				{
					case 0:
						$row['Part'] = "Top";
						break;
					case 1:
						$row['Part'] = "Middle";
						break;
					case 2:
						$row['Part'] = "Bottom";
						break;
				}
				$row['Quantity'] = $value;
				$cardList[] = $row;
			}

			$result['pCards'] = $cardList;

			return $result;
		}
	}

	function getLatestActivity($name = null)
	{
		if (is_null($name) || $name == "" || !$this->players->exists($name))
		{
			// Unregistered user
			return "N/A";
		} else
		{
			// Name is given and exists, grab that player's transaction history
			$tableTransactions = $this->transactions->some('Player', $name);

			$history = array();
			foreach ($tableTransactions as $type)
			{
				$row['Timestamp'] = $type->DateTime;
				$row['Trans'] = $type->Trans;
				switch ($type->Trans)
				{
					case "buy":
						$row['Peanuts'] = "(-10)";
						$row['Action'] = "Purchased a card pack.";
						break;
					case "sell":
						switch ($type->Series)
						{
							case 11:
								$row['Peanuts'] = "+20";
								$row['Action'] = "Sold an assembled bot (matched Series 11).";
								break;
							case 13:
								$row['Peanuts'] = "+50";
								$row['Action'] = "Sold an assembled bot (matched Series 13).";
								break;
							case 26:
								$row['Peanuts'] = "+200";
								$row['Action'] = "Sold an assembled bot (matched Series 26).";
								break;
							case 5:
								$row['Peanuts'] = "+5";
								$row['Action'] = "Sold an assembled bot (mismatched pieces).";
								break;
							default:
								$row['Peanuts'] = "+1";
								$row['Action'] = "Sold a single card.";
								break;
						}
						break;
					default:
						$row['Peanuts'] = "???";
						$row['Action'] = "Unknown Transaction Type.";
						break;
				}
				$history[] = $row;
			}

			array_multisort($history, SORT_DESC);

			$result['transactions'] = $history;

			return $result;
		}
	}

}
