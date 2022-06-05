## Tools Version
- Laravel Framework 7.30.6
- PHPUnit 8.5.26

## Features

### Calling Bingo Numbers

- Given I have a Bingo caller When I call a number Then the number is between 1 and 75 inclusive.
- Given I have a Bingo caller When I call a number 75 times Then all numbers between 1 and 75 are present And no number has been called more than once.

### Generating Bingo Cards
- Given I have a Bingo card generator When I generate a Bingo card Then the generated card has 25 unique spaces And column $column only contains numbers between $lowerBound and $upperBound inclusive And the generated card has 1 FREE space in the middle.

### Checking Bingo Cards
- Given a player calls Bingo after all numbers on their card have been called When I check the card Then the player is the winner.
- Given a player calls Bingo before all numbers on their card have been called When I check the card Then the player is not the winner.

## Execute

Run the following command from the bingo directory
- `composer-install`
- `.\vendor\bin\phpunit`