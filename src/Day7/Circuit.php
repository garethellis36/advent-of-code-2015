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

	public function sendSignal($int, $target)
	{
		$this->wires[$target] = $int;
	}

	public function sendSignalOr($first, $second, $target)
	{
		$this->wires[$target] = $this->wires[$first] | $this->wires[$second];
	}

	public function sendSignalAnd($first, $second, $target)
	{
		$this->wires[$target] = $this->wires[$first] & $this->wires[$second];
	}

	public function sendSignalNot($source, $target)
	{
		$this->wires[$target] = ~ $source;
	}

	public function sendSignalLShift($source, $int, $target)
	{
		$this->wires[$target] = $source << $int;
	}

	public function sendSignalRShift($source, $int, $target)
	{
		$this->wires[$target] = $source >> $int;
	}

	public function getWireStatus($wireIdentifier)
	{
		return $this->wires[$wireIdentifier];
	}
}

