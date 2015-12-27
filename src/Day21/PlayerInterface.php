<?php

namespace Day21;

interface PlayerInterface
{
    public function getHitPoints();

    public function getDamagePoints();

    public function dealDamage($damagePoints);

    public function isBoss();
}
