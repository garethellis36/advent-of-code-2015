<?php

namespace Day21;

class Armour implements DefensiveItemInterface
{
    /**
     * @var
     */
    private $armourPoints;

    public function __construct($armourPoints)
    {
        $this->armourPoints = $armourPoints;
    }

    public function getArmourPoints()
    {
        return $this->armourPoints;
    }
}
