<?php
/**
 * Represents the Deck of cards used to play the game
 * @author Tom Breese <thomasjbreese@gmail.com>
 */
namespace Candyland;

class Deck {

	/**
	 * Full deck of cards
	 * @var array
	 */
	private $deck = [
		// reds
		['card' => 'red', 'double' => true],
		['card' => 'red', 'double' => true],
		['card' => 'red', 'double' => true],
		['card' => 'red', 'double' => true],
		['card' => 'red', 'double' => false],
		['card' => 'red', 'double' => false],
		['card' => 'red', 'double' => false],
		['card' => 'red', 'double' => false],
		['card' => 'red', 'double' => false],
		['card' => 'red', 'double' => false],
		// oranges
		['card' => 'orange', 'double' => false],
		['card' => 'orange', 'double' => false],
		['card' => 'orange', 'double' => false],
		['card' => 'orange', 'double' => false],
		['card' => 'orange', 'double' => false],
		['card' => 'orange', 'double' => false],
		['card' => 'orange', 'double' => false],
		['card' => 'orange', 'double' => true],
		['card' => 'orange', 'double' => true],
		['card' => 'orange', 'double' => true],
		// yellows
		['card' => 'yellow', 'double' => false],
		['card' => 'yellow', 'double' => false],
		['card' => 'yellow', 'double' => false],
		['card' => 'yellow', 'double' => false],
		['card' => 'yellow', 'double' => false],
		['card' => 'yellow', 'double' => false],
		['card' => 'yellow', 'double' => false],
		['card' => 'yellow', 'double' => true],
		['card' => 'yellow', 'double' => true],
		['card' => 'yellow', 'double' => true],
		['card' => 'yellow', 'double' => true],
		// greens
		['card' => 'green', 'double' => false],
		['card' => 'green', 'double' => false],
		['card' => 'green', 'double' => false],
		['card' => 'green', 'double' => false],
		['card' => 'green', 'double' => false],
		['card' => 'green', 'double' => false],
		['card' => 'green', 'double' => false],
		['card' => 'green', 'double' => true],
		['card' => 'green', 'double' => true],
		['card' => 'green', 'double' => true],
		// blues
		['card' => 'blue', 'double' => false],
		['card' => 'blue', 'double' => false],
		['card' => 'blue', 'double' => false],
		['card' => 'blue', 'double' => false],
		['card' => 'blue', 'double' => false],
		['card' => 'blue', 'double' => false],
		['card' => 'blue', 'double' => false],
		['card' => 'blue', 'double' => true],
		['card' => 'blue', 'double' => true],
		['card' => 'blue', 'double' => true],
		['card' => 'blue', 'double' => true],
		// purples
		['card' => 'purple', 'double' => false],
		['card' => 'purple', 'double' => false],
		['card' => 'purple', 'double' => false],
		['card' => 'purple', 'double' => false],
		['card' => 'purple', 'double' => false],
		['card' => 'purple', 'double' => false],
		['card' => 'purple', 'double' => false],
		['card' => 'purple', 'double' => true],
		['card' => 'purple', 'double' => true],
		['card' => 'purple', 'double' => true],
		['card' => 'purple', 'double' => true],
		// character cards
		['card' => 'plumpy', 'double' => false],
		['card' => 'mr. mint', 'double' => false],
		['card' => 'jolly', 'double' => false],
		['card' => 'grandma nut', 'double' => false],
		['card' => 'princess lolly', 'double' => false],
		['card' => 'queen frostine', 'double' => false],
	];

	/**
	 * Current shuffled deck of playing cards
	 * @var array
	 */
	private $activeDeck;

	/**
	 * Instantiates a new deck object and shuffles the deck
	 */
	public function __construct() {
		// make a copy of the deck and shuffle it
		$this->activeDeck = $this->deck;
		shuffle($this->activeDeck);
	}

	/**
	 * Returns the next card on the top of the deck
	 * @return string $card['card']   name of the card
	 * @return bool   $card['double'] whether or not it's a double
	 */
	public function draw() {
		// auto reshuffle if the deck is depleated
		if (count($this->activeDeck) == 0) {
			$this->activeDeck = $this->deck;
			shuffle($this->activeDeck);
		}
		return array_pop($this->activeDeck);
	}
}
