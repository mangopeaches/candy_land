<?php
/**
 * Driver to automatically play the game
 * @author Tom Breese <thomasjbreese@gmail.com>
 */
namespace Candyland;

class Candyland {
	/**
	 * Whether or not the game is over
	 * @var bool
	 */
	private $finished;
	
	/**
	 * Our player objects
	 * @var \Player[]
	 */
	private $players = [];

	/**
	 * Desk of cards
	 * @var \Deck
	 */
	private $deck;

	/**
	 * Keeps track of which players turn it is
	 * @var integer
	 */
	private $turn;

	/**
	 * Creates a new Candland game
	 * @param  array $totalPlayers array of players with their names and ids
	 */
	public function __construct($totalPlayers) {
		if (count($totalPlayers) > 0) {
			foreach ($totalPlayers as $player) {
				$this->players[] = new Player($player['name'], $player['player_id']);
			}
		}
		$this->deck = new Deck();
		// give player 1 the first turn
		$this->turn = 0;
	}

	/**
	 * Play the game
	 * @return void
	 */
	public function play() {
		while (($winner = $this->finished()) === false) {
			foreach ($this->players as $index => $player) {
				$draw = $this->deck->draw();
				echo "Player {$player->getName()} drew ".($draw['double'] ? "double " : "").$draw['card']."\n";
				// check if any players are currently stuck with that card color and unstick them
				foreach ($this->players as $nestedIndex => $nestedPlayer) {
					if ($this->players[$nestedIndex]->getStuck() == $draw['card']) {
						// clear the stuck lock
						$this->players[$nestedIndex]->setStuck(false);
						echo "Player {$nestedPlayer->getName()} is no longer stuck!\n";
					}
				}
				// only move if the player is not stuck
				if ($this->players[$index]->getStuck() === false) {
					// move the player
					$move = Board::move($player->getPosition(), $draw['card'], $draw['double']);
					if ($move['position'] != -1) {
						// print the gumdrop pass/rainbow road, if takenx
						if ($move['special'] !== false) {
							echo "[Special] Player {$player->getName()} is taking the {$move['special']}!\n";
						}
						echo "Player {$player->getName()} has move to position {$move['position']}".($move['stuck'] ? " and is stuck" : "")."\n";
						$this->players[$index]->setPosition($move['position']);
						// if this move made hte player stuck, set the stuck card
						if ($move['stuck']) {
							$this->players[$index]->setStuck($draw['card']);
						}
					} else {
						echo "Player {$player->getName()} has no moves.\n";
					}
				} else {
					echo "Player {$player->getName()} is stuck and cannot move.\n";
				}
			}
		}
		echo "Player {$this->players[$winner]->getName()} wins!\n";
	}

	/**
	 * Check if any of the players has reached the end of the game
	 * @return mixed $winner index of winning player or false when no winner exists
	 */
	public function finished() {
		foreach ($this->players as $index => $player) {
			if (Board::winner($player->getPosition())) {
				return $index;
			}
		}
		return false;
	}
}
