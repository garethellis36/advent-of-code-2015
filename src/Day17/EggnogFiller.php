<?php

namespace Day17;

class EggnogFiller
{
    private $containers = [];

	public function __construct(array $containers)
	{
		$this->containers = $containers;
	}

	public function fill($totalLiquid)
    {
		return $this->doFill($this->containers, $totalLiquid);
    }

	/**
	 * Copied from liquorvicar!
	 *
	 * @param array $containers
	 * @param $remainingLiquid
	 * @param array $sequence
	 * @return array
	 */
    private function doFill(array $containers, $remainingLiquid, array $sequence = [])
    {
		 if ($remainingLiquid === 0) {
			 return [$sequence];
         }
         if (empty($containers)) {
			 return [];
         }
         $container = array_shift($containers);
         $sequences = $this->doFill($containers, $remainingLiquid, $sequence);
         if ($container <= $remainingLiquid) {
			 $sequence[] = $container;
             $sequences = array_merge($sequences, $this->doFill($containers, ($remainingLiquid - $container), $sequence));
         }
         return $sequences;
    }

    public function fillMinimumNumberOfContainers($totalLiquid)
    {
        $possibles = $this->doFill($this->containers, $totalLiquid);
		$min = array_reduce($possibles, function ($carry, $item) {
			if ($carry && $carry < count($item)) {
				return $carry;
			}
			return count($item);
		});

		return array_filter($possibles, function ($combo) use ($min) {
			return count($combo) === $min;
		});
	}
}
