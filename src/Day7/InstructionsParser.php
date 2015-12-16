<?php

namespace Day7;

class InstructionsParser
{
	/**
	 * @var Circuit
	 */
	private $circuit;

	public function __construct(\Day7\Circuit $circuit)
	{
		$this->circuit = $circuit;
	}

    public function parse($instruction)
    {
        list($sources, $target) = explode(" -> ", $instruction);

		if (is_numeric($sources)) {
			return $this->circuit->sendSignal($target, $sources);
		}

		$parts = explode(" ", $sources);
		if (count($parts) == 1) {
			$value = $this->circuit->getWireValue($sources);
			if (is_null($value)) {
				return false;
			}
			return $this->circuit->sendSignal($target, $value);
		}

		if (count($parts) == 2) {
			list($not, $source) = $parts;
			$value = $this->circuit->getWireValue($source);
			if (is_null($value)) {
				return false;
			}
			return $this->circuit->sendSignal($target, ~ $value);
		}

		list($source1, $type, $source2) = $parts;
		$source1 = is_numeric($source1) ? $source1 : $this->circuit->getWireValue($source1);
		$source2 = is_numeric($source2) ? $source2 : $this->circuit->getWireValue($source2);

		if (is_null($source1) || is_null($source2)) {
			return false;
		}

		switch ($type) {

			case "AND":
				$this->circuit->sendSignal($target, $source1 & $source2);
				break;

			case "OR":
				$this->circuit->sendSignal($target, $source1 | $source2);
				break;

			case "LSHIFT":
				$this->circuit->sendSignal($target, $source1 << $source2);
				break;

			case "RSHIFT":
				$this->circuit->sendSignal($target, $source1 >> $source2);
				break;
		}

    }

}

