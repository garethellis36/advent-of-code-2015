<?php

namespace Day16;

class InstructionsParser
{
	public function parse($instruction)
	{
		$pattern = '/Sue (?<number>[0-9]+): (?<properties>.*)/';
		preg_match($pattern, $instruction, $matches);

		$parts = explode(", ", $matches["properties"]);

		$properties = [];
		foreach ($parts as $part) {
			list($property, $value) = explode(": ", $part);
			$properties[$property] = (int)$value;
		}

		return new Sue($matches["number"], $properties);
	}
}

