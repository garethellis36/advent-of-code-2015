<?php

namespace Day21;

class Boss implements PlayerInterface
{
    /**
     * @var
     */
    private $hitPoints;
    /**
     * @var
     */
    private $damagePoints;
    /**
     * @var
     */
    private $armourPoints;

    public function __construct($hitPoints, $damagePoints, $armourPoints)
    {
        $this->hitPoints = $hitPoints;
        $this->damagePoints = $damagePoints;
        $this->armourPoints = $armourPoints;
    }

    public function resurrect($hitPoints)
    {
        $this->hitPoints = $hitPoints;
    }

    public function isBoss()
    {
        return true;
    }

    public function getHitPoints()
    {
        return $this->hitPoints;
    }

    public function getDamagePoints()
    {
        return $this->damagePoints;
    }

    public function dealDamage($damagePoints)
    {
        $damagePoints = $damagePoints - $this->armourPoints;
        if ($damagePoints < 1) {
            $damagePoints = 1;
        }
        $this->hitPoints -= $damagePoints;
    }
}
