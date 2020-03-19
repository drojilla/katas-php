# Katas

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

## [Outside-in TDD - with ohce kata](outside-in-with-ohce-kata/)
Practice outside-in TDD using test doubles.

## [Outside-in TDD - with bank account kata](outside-in-with-bank-kata/)
Practice outside-in TDD to understand the outside-in TDD style.

## How to get started

### Requirements

In order to use these Katas boilerplate you need to have installed Docker.

### Run it

To get started you should clone this repo.

Then got to the kata's folder you want to practice ( for example fizz-buzz kata).

Repeats this operation for any kata you like to practice. 

Uses **make install** for install composer dependencies.

```
git https://github.com/drojilla/katas-php.git
cd katas-php/fizz-buzz/
make install
```

Repeat this actions for any kata you like practice.

To check that all the tests are passing just execute:

```
make tests 
```

The docker's image used contains xdebug for  debbug code. Uses port 9000.
