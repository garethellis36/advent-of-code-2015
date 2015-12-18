<?php

namespace Day11;

class LetterIncrementer
{
    public function increment($letter)
    {
		if ($letter == "z") {
			return "a";
		}
        return ++$letter;
    }
}
