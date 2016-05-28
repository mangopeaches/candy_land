<?php
// inlude classes necessary to play the game
include(dirname(__FILE__).'/Deck.php');
include(dirname(__FILE__).'/Board.php');
include(dirname(__FILE__).'/Player.php');
/**
 * Plays the Candyland game
 */
class Candyland {
	// whether the game is done
	private $finished;
	// player objects
	private $players = [];
	// deck for the game
	private $deck;
	// keep track of each players turn
	private $turn;

	/**
	 * Creates a new Candland game
	 * @param  array $total_players array of players with their names and ids
	 */
	public function __construct($total_players) {
		if (count($total_players) > 0) {
			foreach ($total_players as $player) {
				$this->players[] = new Player($player['name'], $player['player_id']);
			}
		}
		$this->deck = new Deck();
		// give player 1 the first turn
		$this->turn = 0;
	} // end __construct

	/**
	 * Play the game
	 * @return void
	 */
	public function play() {
		while (($winner = $this->finished()) === false) {
			foreach ($this->players as $index => $player) {
				$draw = $this->deck->draw();
				echo "Player {$player->get_name()} drew ".($draw['double'] ? "double " : "").$draw['card']."\n";
				// check if any players are currently stuck with that card color and unstick them
				foreach ($this->players as $nested_index => $nested_player) {
					if ($this->players[$nested_index]->get_stuck() == $draw['card']) {
						// clear the stuck lock
						$this->players[$nested_index]->set_stuck(false);
						echo "Player {$nested_player->get_name()} is no longer stuck!\n";
					}
				}
				// only move if the player is not stuck
				if ($this->players[$index]->get_stuck() === false) {
					// move the player
					$move = Board::move($player->get_position(), $draw['card'], $draw['double']);
					if ($move['position'] != -1) {
						// print the gumdrop pass/rainbow road, if takenx
						if ($move['special'] !== false) {
							echo "[Special] Player {$player->get_name()} is taking the {$move['special']}!\n";
						}
						echo "Player {$player->get_name()} has move to position {$move['position']}".($move['stuck'] ? " and is stuck" : "")."\n";
						$this->players[$index]->set_position($move['position']);
						// if this move made hte player stuck, set the stuck card
						if ($move['stuck']) {
							$this->players[$index]->set_stuck($draw['card']);
						}
					} else {
						echo "Player {$player->get_name()} has no moves.\n";
					}
				} else {
					echo "Player {$player->get_name()} is stuck and cannot move.\n";
				}
			}
		}
		echo "Player {$this->players[$winner]->get_name()} wins!\n";
	} // end play

	/**
	 * Check if any of the players has reached the end of the game
	 * @return mixed $winner index of winning player or false when no winner exists
	 */
	public function finished() {
		foreach ($this->players as $index => $player) {
			if (Board::winner($player->get_position())) {
				return $index;
			}
		}
		return false;
	} // end finished

} // end Candyland