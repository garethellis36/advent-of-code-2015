<?php

namespace Day8;

class ListEntry
{
	private $input;

	public function __construct($input)
	{
		$this->input = $input;
	}

    public function countNumberOfCharsInStringCode()
    {
		return strlen($this->input);
    }

	/**
	 * Pinched & adapted from here: @attrib https://github.com/ultramega/adventofcode2015/blob/master/day08/part1.php
	 */
    public function countNumberOfCharsInMemory()
    {
		$charsInMemory = 0;

		$quoteOpen = false;
		$escape = false;
		$escapeChars = '';
		foreach(str_split($this->input) as $char) {
			if($escape) {
				if($char === '"' || $char === '\\') {
					$charsInMemory++;
					$escape = false;
				} elseif($char === 'x') {
					$escapeChars = '';
				} else {
					$escapeChars .= $char;
					if(strlen($escapeChars) === 2) {
						$charsInMemory += strlen(chr(hexdec($escapeChars)));
						$escape = false;
					}
				}
			} else {
				if($char === '"') {
					$quoteOpen = !$quoteOpen;
				} elseif($char === '\\') {
					$escape = true;
				} else {
					$charsInMemory++;
				}
			}
		}

		return $charsInMemory;
    }

    public function countNumberOfCharsInStringCodeWhenEscaped()
    {
        $input = $this->input;
		$length = 0;
		foreach (str_split($input) as $char) {
			//echo $char . PHP_EOL;
			if ($char == '"' || $char == '\\') {
				$length += 2;
			} else {
				$length++;
			}
		}
		//add the quote marks and return
		return $length + 2;
    }
}

