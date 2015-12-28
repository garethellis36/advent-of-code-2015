<?php
/**
 * Created by PhpStorm.
 * User: garethellis
 * Date: 28/12/2015
 * Time: 08:59
 */

namespace Day21;


trait InventoryLoadingTrait
{
    private function getWeaponCollection()
    {
        $weapons = [];
        $input = $this->loadInput("Day21/Weapons");
        foreach (explode(PHP_EOL, $input) as $weapon) {
            list($name, $cost, $damage, $armour) = \preg_split('/[\s]+/', $weapon);
            $weapons[] = new Weapon($cost, $damage);
        }
        return $weapons;
    }

    private function getArmourCollection()
    {
        $armours = [
            new Armour(0,0),
        ];
        $input = $this->loadInput("Day21/Armours");
        foreach (explode(PHP_EOL, $input) as $armour) {
            list($name, $cost, $damage, $armour) = \preg_split('/[\s]+/', $armour);
            $armours[] = new Armour($cost, $armour);
        }
        return $armours;
    }

    private function getRingCollection()
    {
        $rings = [
            new Ring(0,0,0),
            new Ring(0,0,0),
        ];
        $input = $this->loadInput("Day21/Rings");
        foreach (explode(PHP_EOL, $input) as $ring) {
            list($name, $name2, $cost, $damage, $armour) = \preg_split('/[\s]+/', $ring);
            $rings[] = new Ring($cost, $damage, $armour);
        }
        return $rings;
    }

    private function getRingPermutations($array)
    {
        foreach ($array as $value) {
            foreach ($array as $value2) {
                if ($value != $value2) {
                    yield [$value, $value2];
                }
            }
        }
    }
}