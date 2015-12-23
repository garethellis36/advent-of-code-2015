<?php

namespace Day23;


class Puzzle1
{
	use \ConsoleTrait, \InputLoaderTrait;

	public function __invoke()
	{
		$input = $this->loadInput("Day23/Puzzle1");

		$instructionsList = new InstructionsList($input);
		$a = new Register();
		$b = new Register();

		$runner = new InstructionsRunner($instructionsList, $a, $b);

		$this->write("Executing " . count($instructionsList) . " instructions");

		while ($runner->currentInstructionNumber() + 1 <= count($instructionsList)) {
			$k = $runner->currentInstructionNumber();
			$this->write("Executing instruction {$k}: {$instructionsList[$k]}");
			$runner->execute();
			$this->write("Register a is now " . $a->getValue() . "; register b is now " . $b->getValue(), 2);
		}

		$this->write("Value of register b is now " . $b->getValue());
	}

}