<?php

namespace Day11\Password;

use Day11\LetterIncrementer;

class Generator
{
	private $incrementer;

	private $validator;

    public function __construct(LetterIncrementer $incrementer, Validator $validator)
    {
        $this->incrementer = $incrementer;
		$this->validator = $validator;
    }

	public function nextPassword($password)
	{
        //split password into an array
		$arrayOfChars = str_split($password);

        //step through array in reverse order, incrementing each letter
        //if the incremented letter is "a", we need to continue incrementing the next character to the left
        $index = count($arrayOfChars) - 1;
		while($index) {

            $arrayOfChars[$index] = $this->incrementer->increment($arrayOfChars[$index]);

            if ($arrayOfChars[$index] == "a") {
                $index--;
                continue;
			}

			break;
		}

		return implode("", $arrayOfChars);
	}

    public function nextValidPassword($password)
    {
		while (true) {
			$password = $this->nextPassword($password);
			if ($this->validator->isValidUnderPuzzle1Rules($password)) {
				return $password;
			}
		}

	}
}

