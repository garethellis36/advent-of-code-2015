<?php

namespace Day2;


class PresentSide
{
	private $width;

	private $length;

    public function __construct($width, $length)
    {
		$this->width = $width;
		$this->length = $length;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function getSurfaceArea()
    {
        return $this->width * $this->length;
    }

    public function getPerimeterLength()
    {
        return (2*$this->width) + (2*$this->length);
    }


}