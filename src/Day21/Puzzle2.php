<?php
namespace Day21;

class Puzzle2
{
    use \ConsoleTrait, \InputLoaderTrait, InventoryLoadingTrait;

    public function __invoke()
    {
        $hitPoints = 103;
        $damagePoints = 9;
        $armourPoints = 2;
        $boss = new Boss($hitPoints, $damagePoints, $armourPoints);
        $game = new Game(new TurnTaker());

        $weapons = $this->getWeaponCollection();
        $armours = $this->getArmourCollection();
        $rings = $this->getRingCollection();

        $highestCost = null;

        foreach ($weapons as $w => $weapon) {

            foreach ($armours as $a => $armour) {

                $permutations = $this->getRingPermutations(array_keys($rings));

                foreach ($permutations as $permutation) {

                    $boss->resurrect($hitPoints);

                    $r1 = $permutation[0];
                    $r2 = $permutation[1];
                    $player = new Player($weapon, $armour, $rings[$r1], $rings[$r2], 100);

                    /**
                     * @var $winner PlayerInterface
                     */
                    $winner = $game->play($player, $boss);

                    if ($winner->isBoss()) {

                        $cost = $weapon->getCost()
                                + $armour->getCost()
                                + $rings[$r1]->getCost()
                                + $rings[$r2]->getCost();

                        if (!$highestCost || $cost > $highestCost) {
                            $highestCost = $cost;
                        }

                    }
                }

            }

        }

        $this->write("Highest amount of gold and still losing: " . $highestCost);
    }
}