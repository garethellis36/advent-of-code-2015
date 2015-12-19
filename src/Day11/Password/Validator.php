<?php

namespace Day11\Password;

class Validator
{
	public function hasStraightOfCharacters($password, $straightLength = 3)
	{
		$last = null;
		$straight = 1;
		foreach (str_split($password) as $char) {

			if ($straight == $straightLength) {
				return true;
			}

			$lastCharIncremented = $last;
			$lastCharIncremented++;

			if ($char == $lastCharIncremented) {
				$straight++;
			} else {
				$straight = 1;
			}
			$last = $char;
		}

		return false;
	}

    public function hasInvalidCharacters($password, array $invalidCharacters = ["i", "o", "l"])
    {
        foreach ($invalidCharacters as $char) {
			if (stripos($password, $char) !== false) {
				return true;
			}
		}

		return false;
    }

    public function numberDistinctNonOverlappingPairsOfCharacters($password)
    {
		$pattern = "/([a-z])\\1/";
		preg_match_all($pattern, $password, $matches);

		if (empty($matches["0"])) {
			return false;
		}

		$pairs = array_unique($matches["0"]);

		return count($pairs);
    }

    public function isValidUnderPuzzle1Rules($password)
    {
        return ($this->hasStraightOfCharacters($password, 3)
			&& !$this->hasInvalidCharacters($password)
			&& ($this->numberDistinctNonOverlappingPairsOfCharacters($password) == 2));
    }
}

