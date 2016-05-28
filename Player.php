<?php
/**
 * Represents a player playing the game
 */
class Player {
	// current player position
	private $postion;
	// name of the player
	private $name;
	// whether or not the player is stuck
	private $stuck;
	// unique id for a player
	private $player_id;

	/**
	 * Creates a new player object
	 * @param  string $name  	 name of the player
	 * @param  int    $player_id unique id for the player
	 */
	public function __construct($name, $player_id) {
		$this->name = $name;
		$this->position = 0;
		$this->stuck = false;
		$this->player_id = $player_id;
	} // end __construct

	/**
	 * Sets the playes position
	 * @param int $index position
	 */
	public function set_position($index) {
		$this->position = $index;
	} // end set_position

	/**
	 * Sets the plays stuck status
	 * @param mixed $stuck false to clear the stuck or a string of the color to set stuck
	 */
	public function set_stuck($stuck) {
		$this->stuck = $stuck;
	} // end set_stuck

	/**
	 * Returns the players name
	 * @return string $name player's name
	 */
	public function get_name() {
		return $this->name;
	} // end get_name

	/**
	 * Returns the players current position on the board
	 * @return int $position player's current position
	 */
	public function get_position() {
		return $this->position;
	} // end get_position

	/**
	 * Returns the players stuck status
	 * @return mixed $stuck false when not stuck or a color indicating stuck
	 */
	public function get_stuck() {
		return $this->stuck;
	} // end get_stuck

} // end Player