<?php

namespace Day1;

class InstructionsParser
{
	private $elevator;

	private $instructionsLog = [];

	public function __construct(Elevator $elevator)
	{
		$this->elevator = $elevator;
	}

    public function parseInstructions($instructions)
    {
		foreach (str_split($instructions) as $instruction) {
			if ($instruction == "(") {
				$this->elevator->goUp();
			} else if ($instruction == ")") {
				$this->elevator->goDown();
			}
			$this->instructionsLog[] = $this->elevator->getFloor();
		}
    }

    public function getInstructionsLog()
    {
        return $this->instructionsLog;
    }
}