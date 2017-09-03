<?php
/**
 * Driver to play the game
 * @author Tom Breese <thomasjbreese@gmail.com>
 */

// autoload our classes
spl_autoload_register(function($className) {
	$fullPathToFile = __DIR__.DIRECTORY_SEPARATOR.str_replace('\\', '/', $className).'.php';
	if (file_exists($fullPathToFile)) {
		include($fullPathToFile);
	}
});

$game = new Candyland\Candyland([['name' => 'steve', 'player_id' => 1], ['name' => 'jeff', 'player_id' => 2]]);
$game->play();