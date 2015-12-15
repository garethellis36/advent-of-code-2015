<?php

namespace Day3;

class Santa
{
	private $positionX = 0;
	private $positionY = 0;

	private $housesDeliveredTo = [];

	public function __construct()
	{
		$this->deliverPresentAtCurrentPosition();
	}

	public function getPosition()
	{
		return [
			$this->positionX,
			$this->positionY
		];
	}

	public function moveNorth()
	{
		$this->positionY++;
		$this->deliverPresentAtCurrentPosition();
	}

    public function moveSouth()
    {
        $this->positionY--;
		$this->deliverPresentAtCurrentPosition();
    }

    public function moveWest()
    {
        $this->positionX--;
		$this->deliverPresentAtCurrentPosition();
    }

    public function moveEast()
    {
        $this->positionX++;
		$this->deliverPresentAtCurrentPosition();
    }

	private function deliverPresentAtCurrentPosition()
	{
		$this->housesDeliveredTo[] = [
			$this->positionX,
			$this->positionY
		];
	}

    public function getHousesDeliveredTo()
    {
        return $this->housesDeliveredTo;
    }

    public function getNumberOfUniqueHousesDeliveredTo()
    {
        $houses = array_unique($this->housesDeliveredTo, SORT_REGULAR);
		return count($houses);
    }
}

