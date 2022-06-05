## Tools Version
- Laravel Framework 7.30.6
- PHPUnit 8.5.26

## Features

### Calling Bingo Numbers

- Given I have a Bingo caller When I call a number Then the number is between 1 and 75 inclusive.
- Given I have a Bingo caller When I call a number 75 times Then all numbers between 1 and 75 are present And no number has been called more than once.

## Execute

Run the following command from the bingo directory
- `composer-install`
- `.\vendor\bin\phpunit`