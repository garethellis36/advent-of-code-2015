<?php

namespace Day2;

class PresentPile
{
	private $parser;

	public function __construct(DimensionsParser $parser)
	{
		$this->parser = $parser;
	}

    public function getPresents()
    {
        return $this->parser->parse();
    }

    public function getTotalAmountOfWrappingPaperRequired()
    {
		$total = 0;
		$presents = $this->getPresents();
        foreach ($presents as $present) {
			$total += $present->getTotalAmountOfWrappingPaperRequired();
			$present->getTotalAmountOfWrappingPaperRequired();
		}
		return $total;
    }
}

