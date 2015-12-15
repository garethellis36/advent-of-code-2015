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
        foreach ($this->getPresents() as $present) {
			$total += $present->getTotalAmountOfWrappingPaperRequired();
		}
		return $total;
    }

    public function getTotalAmountOfRibbonRequired()
    {
		$total = 0;
		foreach ($this->getPresents() as $k => $present) {
			$total += $present->getAmountOfRibbonRequired();
		}
		return $total;
    }
}

