<?php

namespace Day20;

class PresentDeliverer
{
	/**
	 * @var FactorInterface
	 */
	private $factor;
	private $multiplier;

	public function __construct(FactorInterface $factor, $multiplier = 10)
	{
		$this->factor = $factor;
		$this->multiplier = $multiplier;
	}

    public function giftsDeliveredToHouse($house)
    {
		$gifts = 0;
        foreach ($this->factor->get($house) as $elfNumber) {
			$gifts += ($elfNumber * $this->multiplier);
		}
		return $gifts;
    }
}
