<?php

namespace Day21;

class Player implements PlayerInterface
{
    /**
     * @var Weapon
     */
    private $weapon;
    /**
     * @var Armour
     */
    private $armour;
    /**
     * @var Ring
     */
    private $ring1;
    /**
     * @var Ring
     */
    private $ring2;

    private $hitPoints = 100;

    public function __construct(Weapon $weapon, Armour $armour, Ring $ring1, Ring $ring2, $hitPoints)
    {
        $this->weapon = $weapon;
        $this->armour = $armour;
        $this->ring1 = $ring1;
        $this->ring2 = $ring2;
        $this->hitPoints = $hitPoints;
    }

    public function getHitPoints()
    {
        return $this->hitPoints;
    }

    public function getDamagePoints()
    {
        return $this->weapon->getDamagePoints()
            + $this->ring1->getDamagePoints()
            + $this->ring2->getDamagePoints();
    }

    public function dealDamage($damagePoints)
    {
        $damagePoints = $damagePoints
            - $this->armour->getArmourPoints()
            - $this->ring1->getArmourPoints()
            - $this->ring2->getArmourPoints();

        if ($damagePoints < 1) {
            $damagePoints = 1;
        }
        $this->hitPoints -= $damagePoints;
    }

}
