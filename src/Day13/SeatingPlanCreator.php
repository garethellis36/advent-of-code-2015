<?php

namespace Day13;

use Day9\Permutations;

class SeatingPlanCreator
{
    private $permutations;

    public function __construct(Permutations $permutations)
    {
        $this->permutations = $permutations;
    }

    public function highestHappinessChange(array $people)
    {
        $keys = array_keys($people);
        $highest = null;
        $table = null;

        foreach ($this->permutations->calculate($keys) as $k => $permutation) {

            $peopleAtTable = [];
            foreach ($permutation as $index) {
                $peopleAtTable[] = $people[$index];
            }

            $table = new Table($peopleAtTable);
            if (!$highest || $table->happinessChange() > $highest->happinessChange()) {
                $highest = $table;
            }
        }

        return $highest;
    }
}
