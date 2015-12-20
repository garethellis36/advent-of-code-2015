<?php

namespace Day14;

class Reindeer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $speed;

    /**
     * @var int
     */
    private $durationOfFlight;

    /**
     * @var int
     */
    private $restTime;

    /**
     * @var int
     */
    private $points = 0;

    public function __construct($name, $speed, $durationOfFlight, $restTime)
    {
        $this->name = $name;
        $this->speed = $speed;
        $this->durationOfFlight = $durationOfFlight;
        $this->restTime = $restTime;
    }

    public function name()
    {
        return trim($this->name);
    }

    public function speed()
    {
        return (int)$this->speed;
    }

    public function durationOfFlight()
    {
        return (int)$this->durationOfFlight;
    }

    public function restTime()
    {
        return (int)$this->restTime;
    }

    /**
     * Formula for calculating distance flown:
     *
     * Total seconds in flight multiplied by speed
     *
     * @param $seconds
     * @return int
     */
    public function distanceAfter($seconds)
    {
       return $this->speed() * $this->secondsInFlight($seconds);
    }

    /**
     * Total seconds in flight:
     * Total number of completed flight cycles multiplied by time per flight cycle
     * Plus any additional seconds in flight during the next cycle
     *
     * A cycle is the amount of time spent flying plus the rest time
     *
     * @param $seconds
     * @return int
     */
    public function secondsInFlight($seconds)
    {
        return ($this->numberOfCompletedFlightCycles($seconds) * $this->durationOfFlight())
            + $this->additionalSecondsInFlightOutsideOfACompletedCycle($seconds);
    }

    public function distancePerFlightCycle()
    {
        return $this->speed() * $this->durationOfFlight();
    }

    public function numberOfCompletedFlightCycles($seconds)
    {
        return (int)floor($seconds / $this->flightCycleDuration());
    }

    public function flightCycleDuration()
    {
        return $this->durationOfFlight() + $this->restTime();
    }

    public function additionalSecondsInFlightOutsideOfACompletedCycle($seconds)
    {
        $remainder = $seconds % $this->flightCycleDuration();
        if ($remainder <= $this->durationOfFlight()) {
            return $remainder;
        }
        return $this->durationOfFlight();
    }

    public function points()
    {
        return $this->points;
    }

    public function awardPoint()
    {
        $this->points++;
    }
}
