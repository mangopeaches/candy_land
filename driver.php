<?php
include(dirname(__FILE__).'/Candyland.php');

$game = new Candyland([['name' => 'steve', 'player_id' => 1], ['name' => 'jeff', 'player_id' => 2]]);
$game->play();