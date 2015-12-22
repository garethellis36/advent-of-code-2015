<?php

namespace Day18;

class GridController
{
	public function startGrid($initialState, $horizontalSize = 100, $verticalSize = 100)
	{
		$lights = [];
		$states = str_split(str_replace(PHP_EOL,"",$initialState));
		$k = 0;
		for ($y = 1; $y <= $verticalSize; $y++) {
			for ($x = 1; $x <= $horizontalSize; $x++) {
				if ($states[$k] == '#') {
					$lights[] = $x . "-" . $y;
				}
				$k++;
			}
		}
		return new AnimatedLightingGrid($lights, $horizontalSize, $verticalSize);
	}

    public function nextGrid(AnimatedLightingGrid $grid)
    {
		$verticalSize = $grid->verticalSize();
		$horizontalSize = $grid->horizontalSize();

		$lights = [];

		for ($y = 1; $y <= $verticalSize; $y++) {
			for ($x =1; $x <= $horizontalSize; $x++) {

				$onNeighbours = 0;
				$currentlyOn = $grid->isOnAt($x, $y);

				foreach ($grid->neighbours($x, $y) as $neighbour) {

					if ($grid->isOnAt($neighbour[0], $neighbour[1])) {
						$onNeighbours++;
					}

					if ($currentlyOn && ($onNeighbours == 2 || $onNeighbours == 3)) {
						$lights[] = "{$x}-{$y}";
						break;
					} elseif (!$currentlyOn && $onNeighbours == 3) {
						$lights[] = "{$x}-{$y}";
						break;
					}
				}
			}
		}

		$grid->lights($lights);

		return $grid;
    }
}

