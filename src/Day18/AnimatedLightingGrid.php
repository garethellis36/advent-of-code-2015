<?php

namespace Day18;

class AnimatedLightingGrid
{
	protected $lights = [];

	protected $horizontalSize;
	protected $verticalSize;

	public function __construct(array $lights, $horizontalSize = 100, $verticalSize = 100)
	{
		$this->lights($lights);
		$this->horizontalSize = $horizontalSize;
		$this->verticalSize = $verticalSize;
	}

	public function isOnAt($x, $y)
	{
		return in_array($this->coordinate($x, $y), $this->lights);
	}

	public function numberTurnedOn()
	{
		return count(array_filter($this->lights, function ($light) {
			return $light;
		}));
    }

	protected function coordinate($x, $y)
	{
		return "{$x}-{$y}";
	}

    public function neighbours($x, $y)
    {
		$neighbours = [];

		if ($x > 1 && $y > 1) {
			$neighbours[] = $this->neighbourAboveAndLeft($x, $y);
		}

		if ($y > 1) {
			$neighbours[] = $this->neighbourAbove($x, $y);
		}

		if ($x < $this->horizontalSize && $y > 1) {
			$neighbours[] = $this->neighbourAboveAndRight($x, $y);
		}

		if ($x > 1) {
			$neighbours[] = $this->neighbourToLeft($x, $y);
		}

		if ($x < $this->horizontalSize) {
			$neighbours[] = $this->neighbourToRight($x, $y);
		}

		if ($x > 1 && $y < $this->verticalSize) {
			$neighbours[] = $this->neighbourBelowAndLeft($x, $y);
		}

		if ($y < $this->verticalSize) {
			$neighbours[] = $this->neighbourBelow($x, $y);
		}

		if ($x < $this->verticalSize && $y < $this->verticalSize) {
			$neighbours[] = $this->neighbourBelowAndRight($x, $y);
		}

		return $neighbours;
    }

	/**
	 * @param $x
	 * @param $y
	 * @return array
	 */
	protected function neighbourToLeft($x, $y)
	{
		return [$x - 1, $y];
	}

	protected function neighbourToRight($x, $y)
	{
		return [$x + 1, $y];
	}

	protected function neighbourAbove($x, $y)
	{
		return [$x, $y - 1];
	}

	protected function neighbourBelow($x, $y)
	{
		return [$x, $y + 1];
	}

	protected function neighbourAboveAndLeft($x, $y)
	{
		return [$x - 1, $y - 1];
	}

	protected function neighbourAboveAndRight($x, $y)
	{
		return [$x + 1, $y - 1];
	}

	protected function neighbourBelowAndLeft($x, $y)
	{
		return [$x - 1, $y + 1];
	}

	protected function neighbourBelowAndRight($x, $y)
	{
		return [$x + 1, $y + 1];
	}

    public function lights(array $lights)
    {
        $this->lights = array_unique($lights);
    }

	public function horizontalSize()
	{
		return $this->horizontalSize;
	}

	public function verticalSize()
	{
		return $this->verticalSize;
	}

	public function getLights()
	{
		return $this->lights;
	}
}

