<?php

namespace Day21;

class Armour implements DefensiveItemInterface, PurchaseableInterface
{
    /**
     * @var
     */
    private $armourPoints;
    /**
     * @var
     */
    private $cost;

    public function __construct($cost, $armourPoints)
    {
        $this->armourPoints = $armourPoints;
        $this->cost = $cost;
    }

    public function getArmourPoints()
    {
        return $this->armourPoints;
    }

    public function getCost()
    {
        return $this->cost;
    }
}
