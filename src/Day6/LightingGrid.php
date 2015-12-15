<?php

namespace Day6;

class LightingGrid
{
	private $lights = [];

	public function turnOn($x, $y)
	{
		$this->lights[$x . "-" . $y] = "on";
	}

    public function isLightOnAt($x, $y)
    {
		$coordinate = $x . "-" . $y;
		return isset($this->lights[$coordinate]);
    }

    public function turnOff($x, $y)
    {
		$coordinate = $x . "-" . $y;
        if (isset($this->lights[$coordinate])) {
			unset($this->lights[$coordinate]);
		}
    }

    public function toggle($x, $y)
    {
		if ($this->isLightOnAt($x, $y)) {
			$this->turnOff($x, $y);
		} else {
			$this->turnOn($x, $y);
		}
    }

    public function getNumberOfTurnOnLights()
    {
        return count($this->lights);
    }
}

