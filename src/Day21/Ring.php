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

    public function __construct($damagePoints, $armourPoints)
    {
        $this->damagePoints = $damagePoints;
        $this->armourPoints = $armourPoints;
    }

    public function getArmourPoints()
    {
        return $this->armourPoints;
    }

    public function getDamagePoints()
    {
        return $this->damagePoints;
    }
}
