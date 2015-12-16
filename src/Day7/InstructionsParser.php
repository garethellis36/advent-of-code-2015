<?php

namespace Day7;

class InstructionsParser
{
	private $circuit;

	public function __construct(Circuit $circuit)
	{
		$this->circuit = $circuit;
	}

    public function parse($instruction)
    {
        list($source, $target) = array_map("trim", explode("->", $instruction));

		if (is_numeric($source) || stripos($source, " ") === false) {
			return $this->circuit->sendSignal($source, $target);
		}

		if (substr($source, 0, 3) == "NOT") {
			list($type, $source) = explode(" ", $source);
			return $this->circuit->sendSignalNot($source, $target);
		}

		list($first, $type, $second) = explode(" ", $source);

		switch ($type) {

			case "AND":
				$this->circuit->sendSignalAnd($first, $second, $target);
				break;

			case "OR":
				$this->circuit->sendSignalOr($first, $second, $target);
				break;

			case "LSHIFT":
				$this->circuit->sendSignalLShift($first, $second, $target);
				break;

			case "RSHIFT":
				$this->circuit->sendSignalRShift($first, $second, $target);
				break;

			default:
				throw new \RuntimeException("Invalid instruction {$type} in instruction {$instruction}");
		}
    }
}

