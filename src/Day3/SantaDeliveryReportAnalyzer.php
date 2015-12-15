<?php

namespace Day3;

class SantaDeliveryReportAnalyzer
{
	private $santa;

	private $robosanta;

	public function __construct(Santa $santa, Santa $robosanta)
	{
		$this->santa = $santa;
		$this->robosanta = $robosanta;
	}

    public function getNumberOfUniqueHousesDeliveredTo()
    {
        $houses = array_merge($this->santa->getHousesDeliveredTo(), $this->robosanta->getHousesDeliveredTo());
		$houses = array_unique($houses, SORT_REGULAR);
		return count($houses);
    }
}

