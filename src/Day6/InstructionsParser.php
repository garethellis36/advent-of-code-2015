<?php

namespace Day6;

class InstructionsParser
{
	private $grid;

	public function __construct(LightingGrid $grid)
	{
		$this->grid = $grid;
	}

	public function parse($instructions)
    {
		$instructions = explode(PHP_EOL, $instructions);
		foreach ($instructions as $instruction) {
			$this->parseSingleInstruction($instruction);
		}
    }

	/**
	 * @param $instruction
	 */
	public function parseSingleInstruction($instruction)
	{
		if (substr($instruction, 0, 7) == "turn on") {
			$callable = "turnOn";
		} elseif (substr($instruction, 0, 8) == "turn off") {
			$callable = "turnOff";
		} else {
			$callable = "toggle";
		}

		$parts = explode(" ", $instruction);

		$bottomRight = array_pop($parts);
		array_pop($parts);	//"through"
		$topLeft = array_pop($parts);

		$topLeft = $this->splitCoordinates($topLeft);
		$bottomRight = $this->splitCoordinates($bottomRight);

		$column = $topLeft["x"];
		while ($column <= $bottomRight["x"]) {
			$row = $topLeft["y"];
			while ($row <= $bottomRight["y"]) {
				$this->grid->$callable($column, $row);
				$row++;
			}
			$column++;
		}
	}

	private function splitCoordinates($commaSeparatedCoordinates)
	{
		$parts = explode(",", $commaSeparatedCoordinates);
		return [
			"x" => (int)$parts[0],
			"y" => (int)$parts[1]
		];
	}
}

