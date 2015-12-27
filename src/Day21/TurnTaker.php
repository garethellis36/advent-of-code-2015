<?php

namespace Day21;

class TurnTaker
{
    public function take(PlayerInterface $attacker, PlayerInterface $defender)
    {
        $damagePoints = $attacker->getDamagePoints();
        $defender->dealDamage($damagePoints);

        return $defender;
    }
}
