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

		while (true) {
			foreach ($instructions as $k => $instruction) {
				if ($parser->parse($instruction) !== false) {
					unset($instructions[$k]);
				}
			}

			if (empty($instructions)) {
				break;
			}
		}

		echo "Signal provided to wire 'a':" . $circuit->getWireValue("a");
	}
}