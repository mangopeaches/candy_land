# Candy Land

Fully automated Candyland game written in php.

## Board Class

This represents the actual game board for the Candyland game.

## Deck Class

This represents the deck of colored cards that are used to play the game.

## Player Class

This, rather obviously, represents each player playing the game.

## Candyland Class

This is a fully automated implementation of the game being played by the supplied players.

## Example

You can run the game in your browser or on the command line via: `php driver.php`
Each time you should get a unqiue set of moves and the eventual winner:
```
$ php driver.php
Player steve drew double purple
Player steve has move to position 7
Player jeff drew double purple
Player jeff has move to position 7
Player steve drew double red
Player steve has move to position 20
Player jeff drew red
Player jeff has move to position 13
Player steve drew orange
Player steve has move to position 24
Player jeff drew purple
Player jeff has move to position 14
Player steve drew purple
Player steve has move to position 27
Player jeff drew orange
Player jeff has move to position 18
Player steve drew blue
Player steve has move to position 29
Player jeff drew princess lolly
Player jeff has move to position 96
Player steve drew double red
Player steve has move to position 38
Player jeff drew double yellow
Player jeff has move to position 104
Player steve drew queen frostine
Player steve has move to position 104
Player jeff drew purple
Player jeff has move to position 109
Player steve drew yellow
Player steve has move to position 110
Player jeff drew double yellow
Player jeff has move to position 116
Player steve drew orange
Player steve has move to position 112
Player jeff drew yellow
Player jeff has move to position 122
Player steve drew double green
Player steve has move to position 119
Player jeff drew green
Player jeff has move to position 125
Player steve drew yellow
Player steve has move to position 122
Player jeff drew green
Player jeff has move to position 131
Player steve drew mr. mint
Player steve has move to position 17
Player jeff drew red
Player jeff has move to position 132
Player steve drew double purple
Player steve has move to position 27
Player jeff drew double green
Player jeff has no moves.
Player steve drew orange
Player steve has move to position 30
Player jeff drew purple
Player jeff has move to position 133
Player jeff wins!
```
