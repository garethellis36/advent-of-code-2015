<?php

namespace Day6;

class LightingGridWithAdjustableBrightness implements ControllableLightingGrid
{
	private $lights = [];

	public function turnOn($x, $y)
	{
		if ($this->isLightOnAt($x, $y)) {
			$this->increaseBrightness($x, $y);
		} else {
			$this->lights[$x . "-" . $y] = 1;
		}
	}

	private function increaseBrightness($x, $y, $amount = 1)
	{
		$this->lights[$x . "-" . $y] += $amount;
	}

	/**
	 * Get status of light at given coordinate
	 *
	 * @param $x
	 * @param $y
	 * @return int|bool returns integer to indicate brightness of light or false if light is not on
	 */
	public function isLightOnAt($x, $y)
	{
		if (!isset($this->lights[$x . "-" . $y])) {
			return false;
		}
		return $this->lights[$x . "-" . $y];
	}

	public function turnOff($x, $y)
	{
		$coordinate = $x . "-" . $y;
		if (isset($this->lights[$coordinate])) {
			if ($this->lights[$coordinate] == 1) {
				unset($this->lights[$coordinate]);
			} else {
				$this->lights[$coordinate]--;
			}
		}
	}

	public function toggle($x, $y)
	{
		if ($this->isLightOnAt($x, $y)) {
			$this->increaseBrightness($x, $y, 2);
		} else {
			$this->lights[$x . "-" . $y] = 2;
		}
	}

    public function getCumulativeBrightness()
    {
        return array_sum($this->lights);
    }
}
