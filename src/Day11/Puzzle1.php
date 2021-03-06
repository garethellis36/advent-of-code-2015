<?php

namespace Day11;


use Day11\Password\Generator;
use Day11\Password\Validator;

class Puzzle1
{
	public function __invoke()
	{
		$generator = new Generator(new LetterIncrementer(), new Validator());
		echo  "Next valid password: " . $generator->nextValidPassword("hxbxwxba") . PHP_EOL;
	}
}