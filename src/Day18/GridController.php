<?php

namespace Day18;

class GridController
{
	public function startGrid($initialState, $horizontalSize = 100, $verticalSize = 100, $broken = false)
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

		if ($broken) {
            return new BrokenAnimatedLightingGrid($lights, $horizontalSize, $verticalSize);
        }
		return new AnimatedLightingGrid($lights, $horizontalSize, $verticalSize);
	}

    public function nextGrid(AnimatedLightingGrid $grid)
    {
		$verticalSize = $grid->verticalSize();
		$horizontalSize = $grid->horizontalSize();

		$lights = [];

		$existingLights = $grid->getLights();

		//loop through grid checking each light for its status + neighbours
		for ($y = 1; $y <= $verticalSize; $y++) {
			for ($x =1; $x <= $horizontalSize; $x++) {

				//find out how many neighbour lights are switched on
				$onNeighbours = 0;
				foreach ($grid->neighbours($x, $y) as $neighbour) {
					if (in_array($neighbour[0] . "-" . $neighbour[1], $existingLights)) {
						$onNeighbours++;
					}
				}

				//work out state for this light for next step
				$currentlyOn = in_array("{$x}-{$y}", $existingLights);
				if ($currentlyOn && ($onNeighbours == 2 || $onNeighbours == 3)) {
					$lights[] = "{$x}-{$y}";
				} elseif (!$currentlyOn && $onNeighbours == 3) {
					$lights[] = "{$x}-{$y}";
				}
			}
		}

		$grid->lights($lights);

		return $grid;
    }
}

