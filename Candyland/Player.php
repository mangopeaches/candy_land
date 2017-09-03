<?php
/**
 * Represents a player playing the game
 * @author Tom Breese <thomasjbreese@gmail.com>
 */
namespace Candyland;

class Player {
	/**
	 * Player's current position
	 * @var integer
	 */
	private $postion;

	/**
	 * Name of the player
	 * @var string
	 */
	private $name;

	/**
	 * Whether or not the player is stuck
	 * @var bool
	 */
	private $stuck;

	/**
	 * Player's unique id
	 * @var mixed
	 */
	private $playerId;

	/**
	 * Creates a new player object
	 * @param  string $name  	 name of the player
	 * @param  int    $playerId unique id for the player
	 */
	public function __construct($name, $playerId) {
		$this->name = $name;
		$this->position = 0;
		$this->stuck = false;
		$this->playerId = $playerId;
	}

	/**
	 * Sets the playes position
	 * @param int $index position
	 * @return void
	 */
	public function setPosition($index) {
		$this->position = $index;
	}

	/**
	 * Sets the plays stuck status
	 * @param mixed $stuck false to clear the stuck or a string of the color to set stuck
	 * @return void
	 */
	public function setStuck($stuck) {
		$this->stuck = $stuck;
	}

	/**
	 * Returns the players name
	 * @return string $name player's name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Returns the players current position on the board
	 * @return int $position player's current position
	 */
	public function getPosition() {
		return $this->position;
	}

	/**
	 * Returns the players stuck status
	 * @return mixed $stuck false when not stuck or a color indicating stuck
	 */
	public function getStuck() {
		return $this->stuck;
	} 
}
