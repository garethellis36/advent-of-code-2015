<?php

namespace Day9;

class IntercityJourney
{
	private $start;

	private $end;

	public function __construct(City $start, City $end)
	{
		$this->start = $start;
		$this->end = $end;
	}

    public function distance()
    {
        return (int)$this->start->distanceTo($this->end->getName());
    }
}

