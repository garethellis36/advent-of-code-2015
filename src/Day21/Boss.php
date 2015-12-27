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
    private $armorPoints;

    public function __construct($hitPoints, $damagePoints, $armorPoints)
    {
        $this->hitPoints = $hitPoints;
        $this->damagePoints = $damagePoints;
        $this->armorPoints = $armorPoints;
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
        $damagePoints = $damagePoints - $this->armorPoints;
        if ($damagePoints < 1) {
            $damagePoints = 1;
        }
        $this->hitPoints -= $damagePoints;
    }
}
