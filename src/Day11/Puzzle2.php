<?php

namespace Day11;


use Day11\Password\Generator;
use Day11\Password\Validator;

class Puzzle2
{
	public function __invoke()
	{
		$generator = new Generator(new LetterIncrementer(), new Validator());
		echo  "Next valid password: " . $generator->nextValidPassword("hxbxxyzz") . PHP_EOL;
	}
}