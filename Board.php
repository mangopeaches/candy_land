<?php

class Board {
	// game boar as an array
	private static $board = [
		['color' => 'red'],
		['color' => 'purple'], 
		['color' => 'yellow'],
		['color' => 'blue'],
		['color' => 'orange', 'special' => 'Rainbow Trail', 'goto' => 59], // TODO: add array index
		['color' => 'green'],
		['color' => 'red'],
		['color' => 'purple'],
		['color' => 'plumpy'], // 8
		['color' => 'yellow'],
		['color' => 'blue'],
		['color' => 'orange'],
		['color' => 'green'],
		['color' => 'red'],
		['color' => 'purple'],
		['color' => 'yellow'],
		['color' => 'blue'],
		['color' => 'mr. mint'], // 17
		['color' => 'orange'],
		['color' => 'green'],
		['color' => 'red'],
		['color' => 'purple'],
		['color' => 'yellow'],
		['color' => 'blue'],
		['color' => 'orange'],
		['color' => 'green'],
		['color' => 'red'],
		['color' => 'purple'],
		['color' => 'yellow'],
		['color' => 'blue'],
		['color' => 'orange'],
		['color' => 'green'],
		['color' => 'red'],
		['color' => 'purple', 'special' => 'Gumdrop Pass', 'goto' => 47], // 34
		['color' => 'yellow'],
		['color' => 'blue'],
		['color' => 'orange'],
		['color' => 'green'],
		['color' => 'red'],
		['color' => 'purple'],
		['color' => 'yellow'],
		['color' => 'blue'],
		['color' => 'jolly'], // 43
		['color' => 'orange'],
		['color' => 'green'],
		['color' => 'red'],
		['color' => 'purple'], // gumdrop pass target
		['color' => 'yellow', 'special' => 'stuck', 'draw' => 'yellow'],
		['color' => 'blue'],
		['color' => 'orange'],
		['color' => 'green'],
		['color' => 'red'],
		['color' => 'purple'],
		['color' => 'yellow'],
		['color' => 'blue'],
		['color' => 'orange'],
		['color' => 'green'],
		['color' => 'red'],
		['color' => 'purple'], // rainbox trail target
		['color' => 'yellow'],
		['color' => 'blue'],
		['color' => 'orange'],
		['color' => 'green'],
		['color' => 'red'],
		['color' => 'purple'],
		['color' => 'yellow'],
		['color' => 'blue'],
		['color' => 'orange'],
		['color' => 'green'],
		['color' => 'red'],
		['color' => 'purple'],
		['color' => 'yellow'],
		['color' => 'blue'],
		['color' => 'orange'],
		['color' => 'grandma nut'], // 75
		['color' => 'green'],
		['color' => 'red'],
		['color' => 'purple'],
		['color' => 'yellow'],
		['color' => 'blue'],
		['color' => 'orange'],
		['color' => 'green'],
		['color' => 'red'],
		['color' => 'purple'],
		['color' => 'yellow'],
		['color' => 'blue', 'special' => 'stuck', 'draw' => 'blue'],
		['color' => 'orange'],
		['color' => 'green'],
		['color' => 'red'],
		['color' => 'purple'],
		['color' => 'yellow'],
		['color' => 'blue'],
		['color' => 'orange'],
		['color' => 'green'],
		['color' => 'red'],
		['color' => 'princess lolly'], // 96
		['color' => 'purple'],
		['color' => 'yellow'],
		['color' => 'blue'],
		['color' => 'orange'],
		['color' => 'green'],
		['color' => 'red'],
		['color' => 'purple'],
		['color' => 'queen frostine'], // 104
		['color' => 'yellow'],
		['color' => 'blue'],
		['color' => 'orange'],
		['color' => 'green'],
		['color' => 'red'],
		['color' => 'purple'],
		['color' => 'yellow'],
		['color' => 'blue'],
		['color' => 'orange'],
		['color' => 'green'],
		['color' => 'red'],
		['color' => 'purple'],
		['color' => 'yellow'],
		['color' => 'blue'],
		['color' => 'orange'],
		['color' => 'green'],
		['color' => 'red', 'special' => 'stuck', 'draw' => 'red'],
		['color' => 'purple'],
		['color' => 'yellow'],
		['color' => 'blue'],
		['color' => 'orange'],
		['color' => 'green'],
		['color' => 'red'],
		['color' => 'purple'],
		['color' => 'yellow'],
		['color' => 'blue'],
		['color' => 'orange'],
		['color' => 'green'],
		['color' => 'red'],
		['color' => 'purple'],
	];

	// quick special => position map
	private static $specials = [
		'plumpy' => 8,
		'mr. mint' => 17,
		'jolly' => 43,
		'grandma nut' => 75,
		'princess lolly' => 96,
		'queen frostine' => 104,
	];

	// array of valid colors
	private static $colors = ['red', 'purple', 'yellow', 'blue', 'orange', 'green'];

	/**
	 * Returns the name of the current position based on the index
	 * @param  int 	  $index baord location
	 * @return string $name  friendly name for the spot
	 */
	public static function get_position($index) {
		if (array_key_exists($index, self::$board)) {
			return self::$board[$index]['color'];
		} else {
			return false;
		}
	} // end get_position

	/**
	 * Returns the next position for the player
	 * @param  int    $position 		current board position
	 * @param  string $card     		card type
	 * @param  bool   $double 			whether it's a double card
	 * @return int    $move['position'] board position in which to move, 0 when move is not valid
	 * @return bool   $move['stuck']	whether or not we're stuck on this spot
	 * @return string $move['special']  special path taken, rainbow road or gumdrop pass
	 */
	public static function move($position, $card, $double) {
		// start looking at the next space, unless we're at the beginning of the game
		if ($position != 0) {
			$position++;
		}
		// initialize return array
		$move = ['position' => -1, 'stuck' => false, 'special' => false];
		// check if this is a special card
		if (isset(self::$specials[$card])) {
			$move['position'] = self::$specials[$card];
		} else {
			if (in_array($card, self::$colors)) {
				// use flag for double card cases where we need to move two spots of the color
				$first = true;
				// move down the array from the current position until you find the next color
				for ($i = $position; $i <= count(self::$board) -1; $i++) {
					if (self::$board[$i]['color'] == $card) {
						// check if it's a special card
						if (isset(self::$board[$i]['special'])) {
							// check if this is a stuck special or a pass
							if (self::$board[$i]['special'] != 'stuck') {
								// this is a pass [rainbox or gumdrop], return the jump position
								// only do the goto when landing on the spot, pass over it if we're still going on a double
								if (!$double || $double && !$first) {
									if (array_key_exists('goto', self::$board[$i])) {
										$move['position'] = self::$board[$i]['goto'];
										// set the name of the special
										$move['special'] = self::$board[$i]['special'];
									}
								}
							} else {
								$move['position'] = $i;
								$move['stuck'] = true;
							}
						} else {
							$move['position'] = $i;
						}
						// determine stopping case
						if ($first && !$double) {
							break;
						} else if ($double && !$first) {
							break;
						} else if ($move['position'] == count(self::$board)) {
							// stop processing doubles, we already won!
							break;
						}
						$first = false;
					}
				}
			}
		}
		return $move;
	} // end move

	/**
	 * Determines if the game is over
	 * @param  int $index board position
	 * @return bool
	 */
	public static function winner($index) {
		return ($index == count(self::$board) - 1);
	} // end winner

} // end Board