<?php
namespace Day13;

use Day9\Permutations;

class Puzzle2
{
    use \ConsoleTrait, \InputLoaderTrait;

    public function __invoke()
    {
        \ini_set("memory_limit", "2G");
        $input = $this->loadInput("Day13/Puzzle1");

        $people = (new InstructionsParser())->parse($input, "Gareth");

        $permutations = new Permutations();
        $planner = new SeatingPlanCreator($permutations);
        $highest = $planner->highestHappinessChange($people);

        $this->write("Highest happiness change: " . $highest->happinessChange());
    }


}