# Katas

## [Empty skeleton](empty-skeleton/)
An empty skeleton to start doing TDD.

## [Mars Rover's kata](mars-rover-session-1/)
Session 1: TDD Practice.
Implementing Mars Rover's Movement

## [Mars Rover's kata](mars-rover-session-2/)
Session 2: Refactoring Practice.
Refactoring a smelly Mars Rover's code

## [Mars Rover's kata](mars-rover-session-3/)
Session 3: Adding a new feature to an existing code base.
Supporting ESA commands as well (1)

## [Mars Rover's kata](mars-rover-session-4/)
Session 4: Adding a new feature to an existing code base.
Supporting ESA commands as well (2)

## [Fizz Buzz](fizz-buzz/)
Good kata to start doing TDD.

## [Gilded Rose](gilded-rose/)
Refactoring kata.

## [Password validator](password-validator/)
Kata to practice the importance of the test order.

## [Coffee Machine](coffee-machine/)
Good kata to learn Outside-in TDD with test doubles.

## [Brownish Greenfield Gilded Rose](brownish-greenfield-gilded-rose/)
Working with code we do not own.

## [Beverage Prices refactoring](refactoring-awful-inheritance-use-with-beverage-prices/)
Refactoring away from an awful usage of inheritance.

## [Birthday Greetings](refactoring-to-hexagonal-architecture/)
Refactoring to Hexagonal Architecture.

## [Text Converter](text-converter/)
Doing TDD on legacy code.

## [Outside-in TDD and test doubles](outside-in-with-ohce-kata/)
Outside-in TDD with Ohce kata.

## [Outside-in TDD, CRC cards and test doubles.](outside-in-with-bank-kata/)
Outside-in TDD with Bank Account kata.

## [Outside-in TDD, CRC cards and test doubles (II)](outside-in-with-unusual-spending-alert-service/)
Outside-in TDD with Unusual Spending Kata.

## How to get started

### Requirements

In order to use these Katas boilerplate you need to have installed Docker.

### Run it

To get started you should clone this repo.

Then got to the kata's folder you want to practice ( for example fizz-buzz kata).

Repeats this operation for any kata you like to practice. 

Uses **make install** for install composer dependencies.

```
git clone https://github.com/drojilla/katas-php.git
cd katas-php/fizz-buzz/
make install
```

Repeat this actions for any kata you like practice.

To check that all the tests are passing just execute:

```
make tests 
```

The docker's image used contains xdebug for  debbug code. Uses port 9000.
