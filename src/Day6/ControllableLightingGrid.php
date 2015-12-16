<?php

namespace Day6;

interface ControllableLightingGrid
{
	public function turnOn($x, $y);

	public function turnOff($x, $y);

	public function toggle($x, $y);

	public function isLightOnAt($x, $y);
}
