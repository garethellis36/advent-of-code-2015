<?php

namespace Day21;

class Ring implements AttackingItemInterface, DefensiveItemInterface
{
    /**
     * @var
     */
    private $damagePoints;
    /**
     * @var
     */
    private $armourPoints;
    /**
     * @var
     */
    private $cost;

    public function __construct($cost, $damagePoints, $armourPoints)
    {
        $this->damagePoints = $damagePoints;
        $this->armourPoints = $armourPoints;
        $this->cost = $cost;
    }

    public function getArmourPoints()
    {
        return $this->armourPoints;
    }

    public function getDamagePoints()
    {
        return $this->damagePoints;
    }

    public function getCost()
    {
        return $this->cost;
    }
}
