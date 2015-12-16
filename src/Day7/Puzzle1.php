<?php

namespace Day7;


class Puzzle1
{
	public function __invoke()
	{
		$circuit = new Circuit(new WiresCollection());
		$parser = new InstructionsParser($circuit);

		$input = file_get_contents(__DIR__ . "/../../input/Day7/Puzzle1");
		$instructions = explode(PHP_EOL, $input);

		sort($instructions);

		foreach ($instructions as $instruction) {
			$parser->parse($instruction);
		}

		echo "Signal provided to wire 'a':" . $circuit->getWireStatus("a");
	}
}