<?php
/**
 * Deck of cards for the game
 */
class Deck {
	// full deck of cards
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
	// current shuffled playing deck
	private $active_deck;

	/**
	 * Instantiates a new deck object and shuffles the deck
	 */
	public function __construct() {
		// make a copy of the deck and shuffle it
		$this->active_deck = $this->deck;
		shuffle($this->active_deck);
	} // end __construct

	/**
	 * Returns the next card on the top of the deck
	 * @return string $card['card']   name of the card
	 * @return bool   $card['double'] whether or not it's a double
	 */
	public function draw() {
		// auto reshuffle if the deck is depleated
		if (count($this->active_deck) == 0) {
			$this->active_deck = $this->deck;
			shuffle($this->active_deck);
		}
		return array_pop($this->active_deck);
	} // end draw

} // end Deck