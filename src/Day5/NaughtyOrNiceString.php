<?php

namespace Day5;

class NaughtyOrNiceString
{
	private $input;

	private $forbiddenSequences = [
		"ab",
		"cd",
		"pq",
		"xy"
	];

	public function __construct($input)
	{
		$this->setInput($input);
	}

	public function setInput($input)
	{
		$this->input = $input;
	}

    public function getNumberOfVowels()
    {
        $pattern = "/(a|e|i|o|u)/";
		if (preg_match_all($pattern, $this->input, $vowels) === false) {
			return 0;
		}
		return count($vowels[0]);
    }

    public function hasRepeatedLetters()
    {
        $pattern = "/([a-z])\\1+/";
		return (bool)preg_match($pattern, $this->input);
    }

    public function hasForbiddenCharacterSequence()
    {
		foreach ($this->forbiddenSequences as $seq) {
			if (stripos($this->input, $seq) !== false) {
				return true;
			}
		}
		return false;
    }

    public function isNice($numberOfVowelsRequiredToBeNice = 3)
    {
        if ($this->hasForbiddenCharacterSequence()) {
			return false;
		}
		return ($this->getNumberOfVowels() >= $numberOfVowelsRequiredToBeNice && $this->hasRepeatedLetters());
    }

    public function hasRepeatedPairOfNonOverlappingLetters()
    {
		$pattern = "/([a-z]{2}).*?\\1/";
		return (bool)preg_match_all($pattern, $this->input);
    }

    public function hasRepeatedLetterWithOneLetterInBetween()
    {
        $pattern = "/([a-z])[a-z]\\1{1}/";
		return (bool)preg_match($pattern, $this->input);
    }

    public function isNiceAccordingToNewRules()
    {
        return ($this->hasRepeatedLetterWithOneLetterInBetween() && $this->hasRepeatedPairOfNonOverlappingLetters());
    }
}

