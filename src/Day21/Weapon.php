<?php

namespace Day21;

class Weapon implements AttackingItemInterface, PurchaseableInterface
{
    /**
     * @var
     */
    private $damagePoints;
    /**
     * @var
     */
    private $cost;

    public function __construct($cost, $damagePoints)
    {
        $this->damagePoints = $damagePoints;
        $this->cost = $cost;
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
