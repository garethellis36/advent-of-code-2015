<?php
namespace Day21;

use Day9\Permutations;

class Puzzle1
{
    use \ConsoleTrait, \InputLoaderTrait;

    public function __invoke()
    {
        $boss = new Boss(103,9,2);
        $game = new Game(new TurnTaker());

        $weapons = $this->getWeaponCollection();
        $armours = $this->getArmourCollection();
        $rings = $this->getRingCollection();

        $permutations = new Permutations();

        $lowestCost = null;

        foreach ($weapons as $w => $weapon) {

            foreach ($armours as $a => $armour) {

                $permutations = $this->getRingPermutations(array_keys($rings));

                foreach ($permutations as $permutation) {

                    $r1 = $permutation[0];
                    $r2 = $permutation[1];
                    $player = new Player($weapon, $armour, $rings[$r1], $rings[$r2], 100);

                    /**
                     * @var $winner PlayerInterface
                     */
                    $winner = $game->play($player, $boss);

                    $this->write("Weapon {$w}, Armour {$a}, Rings {$r1} & {$r2} - winner is " . ($winner->isBoss() ? "boss" : "player"));

                    if (!$winner->isBoss()) {

                        $cost = $weapon->getCost()
                                + $armour->getCost()
                                + $rings[$r1]->getCost()
                                + $rings[$r2]->getCost();

                        $this->write("Cost: {$cost}");

                        if (!$lowestCost || $cost < $lowestCost) {
                            $lowestCost = $cost;
                        }

                    }
                }

            }

        }

        $this->write("Lowest amount of gold to win: " . $lowestCost);
    }

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
                yield [$value, $value2];
            }
        }
    }
}