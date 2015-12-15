<?php

namespace Day3;

class InstructionsParser
{
	private $santa;

	private $robosanta;

	public function __construct(Santa $santa, Santa $robosanta = null)
	{
		$this->santa = $santa;
		$this->robosanta = $robosanta;
	}

    public function parse($instructions)
    {
		foreach (str_split($instructions) as $instruction) {
			$this->parseInstruction($instruction, $this->santa);
		}
    }

	public function parseForTwoSantas($instructions)
	{
		if (!$this->robosanta) {
			throw new \RuntimeException("Robosanta must be provided in order to use this method");
		}

		foreach (str_split($instructions) as $k => $instruction) {

			if ($k == 0 || $k % 2 == 0) {
				$santa = $this->santa;
			} else {
				$santa = $this->robosanta;
			}

			$this->parseInstruction($instruction, $santa);
		}
	}

	/**
	 * @param $instruction
	 */
	private function parseInstruction($instruction, Santa $santa)
	{
		switch ($instruction) {
			case "^":
				$santa->moveNorth();
				break;

			case "v":
				$santa->moveSouth();
				break;

			case "<":
				$santa->moveWest();
				break;

			case ">":
				$santa->moveEast();
				break;

			default:
				throw new \InvalidArgumentException("'{$instruction}'' is not a valid instruction");
		}
	}
}

