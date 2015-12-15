<?php

namespace Day2;

class Present
{
	private $length;

	private $width;

	private $height;

	/**
	 * @var array PresentSide[]
	 */
	private $sides = [];

    public function __construct(array $dimensions)
    {
        if (!isset($dimensions["length"]) || !isset($dimensions["height"]) || !isset($dimensions["width"])) {
			throw new \InvalidArgumentException("Please provide all dimensions");
		}

		$this->length = $dimensions["length"];
		$this->width = $dimensions["width"];
		$this->height = $dimensions["height"];

		$this->setSides();
    }

	private function setSides()
	{
		$this->sides = [];

		$side1 = $this->getPresentSideInstance($this->length, $this->width);
		$side2 = $this->getPresentSideInstance($this->width, $this->height);
		$side3 = $this->getPresentSideInstance($this->length, $this->height);

		$this->sides = [
			1 => $side1,
			2 => $side2,
			3 => $side3,
			4 => $side1,
			5 => $side2,
			6 => $side3
		];
	}

	/**
	 * @return mixed
	 */
	public function getLength()
	{
		return $this->length;
	}

	/**
	 * @return mixed
	 */
	public function getWidth()
	{
		return $this->width;
	}

	/**
	 * @return mixed
	 */
	public function getHeight()
	{
		return $this->height;
	}

    public function getSides()
    {
        return $this->sides;
    }

	/**
	 * @param $length
	 * @param $dimension2
	 * @return PresentSide
	 */
	private function getPresentSideInstance($dimension1, $dimension2)
	{
		return new PresentSide($dimension1, $dimension2);
	}

    public function getSide($sideNumber)
    {
        if (!isset($this->sides[$sideNumber])) {
			throw new \InvalidArgumentException("Invalid side number provided");
		}

		return $this->sides[$sideNumber];
    }

    public function getTotalSurfaceArea()
    {
		$totalSurfaceArea = 0;
        foreach ($this->sides as $side) {
			$totalSurfaceArea += $side->getSurfaceArea();
		}
		return $totalSurfaceArea;
    }

    public function getAreaOfSmallestSide()
    {
		$smallest = $this->getSmallestSideBySurfaceArea();
		return $smallest->getSurfaceArea();
    }

	private function getSmallestSideBySurfaceArea()
	{
		$sizes = [];
		foreach ($this->sides as $sideNumber => $side) {
			$sizes[$sideNumber] = $side->getSurfaceArea();
		}
		$sizes = array_unique($sizes);
		asort($sizes);

		reset($sizes);
		return $this->sides[key($sizes)];
	}

    public function getTotalAmountOfWrappingPaperRequired()
    {
        return $this->getTotalSurfaceArea() + $this->getAreaOfSmallestSide();
    }

    public function getVolume()
    {
        return $this->width * $this->length * $this->height;
    }

    public function getShortestPerimeter()
    {
		$smallest = $this->getSmallestSideByPerimeter();
		return $smallest->getPerimeterLength();
    }

	private function getSmallestSideByPerimeter()
	{
		$sizes = [];
		foreach ($this->sides as $sideNumber => $side) {
			$sizes[$sideNumber] = $side->getPerimeterLength();
		}
		$sizes = array_unique($sizes);
		asort($sizes);
		reset($sizes);
		return $this->sides[key($sizes)];
	}

    public function getAmountOfRibbonRequired()
    {
        return $this->getVolume() + $this->getShortestPerimeter();
    }


}