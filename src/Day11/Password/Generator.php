<?php

namespace Day11\Password;

use Day11\LetterIncrementer;

class Generator
{
	private $incrementer;

    public function __construct(LetterIncrementer $incrementer)
    {
        $this->incrementer = $incrementer;
    }

	public function nextPassword($password)
	{
		$arrayOfChars = str_split($password);
		$reversed = array_reverse($arrayOfChars);

		foreach ($reversed as &$character) {

			$character = $this->incrementer->increment($character);
			if ($character == "a") {
				continue;
			}

			break;
		}

		return implode("", array_reverse($reversed));
	}
}

