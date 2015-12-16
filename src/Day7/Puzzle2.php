<?php

namespace Day7;


class Puzzle2
{
	public function __invoke()
	{
		$circuit = new Circuit(new WiresCollection());
		$parser = new InstructionsParser($circuit);

		$input = file_get_contents(__DIR__ . "/../../input/Day7/Puzzle1");
		$instructions = explode(PHP_EOL, $input);

		$parser->parse("3176 -> b");

		while (true) {
			foreach ($instructions as $k => $instruction) {

				if (substr($instruction, strlen($instruction) -4, 4) == "-> b") {
					unset($instructions[$k]);
					continue;
				}

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