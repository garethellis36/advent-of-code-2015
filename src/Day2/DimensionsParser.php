<?php

namespace Day2;


class DimensionsParser
{
	private $instructions;

    public function __construct($instructions)
    {
        $this->instructions = $instructions;
    }

    public function parse()
    {
		$presents = explode(PHP_EOL, $this->instructions);
		$presentsCollection = [];
		foreach ($presents as $present) {
			list($length, $width, $height) = explode("x", $present);
			$presentsCollection[] = new Present([
				"length" => $length,
				"width" => $width,
				"height" => $height
			]);
		}
		return $presentsCollection;
    }
}