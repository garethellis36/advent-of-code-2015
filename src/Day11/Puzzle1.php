<?php

namespace Day11;


use Day11\Password\Generator;
use Day11\Password\Validator;

class Puzzle1
{
	public function __invoke()
	{
		$incrementer = new LetterIncrementer();
		$generator = new Generator($incrementer);

		$validator = new Validator();

		$password = "hxbxwxba";
		echo "Starting with {$password}";

		while (true) {
			$password = $generator->nextPassword($password);
			if ($validator->isValidUnderPuzzle1Rules($password)) {
				break;
			}
			echo PHP_EOL . "'{$password}' is not valid";
		}

		echo PHP_EOL . "Next valid password: {$password}";
	}
}