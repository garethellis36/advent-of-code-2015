<?php

namespace Day7;

class Circuit
{
	/**
	 * @var WiresCollection
	 */
	private $wires;

	public function __construct(WiresCollection $wires)
	{
		$this->wires = $wires;
	}

    public function getWireValue($wireIdentifier)
    {
        return $this->wires[$wireIdentifier];
    }

    public function sendSignal($wireIdentifier, $value)
    {
        $this->wires[$wireIdentifier] = $value;
    }

    public function resetAllWires()
    {
        $this->wires->resetAll();
    }
}
