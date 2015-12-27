<?php

namespace Day21;

class Weapon implements AttackingItemInterface
{
    /**
     * @var
     */
    private $damagePoints;

    public function __construct($damagePoints)
    {
        $this->damagePoints = $damagePoints;
    }

    public function getDamagePoints()
    {
        return $this->damagePoints;
    }
}
