<?php
namespace Day13;

use Day9\Permutations;

class Puzzle1
{
    use \ConsoleTrait, \InputLoaderTrait;

    public function __invoke()
    {
        $input = $this->loadInput("Day13/Puzzle1");

        $people = (new InstructionsParser())->parse($input);

        $permutations = new Permutations();
        $planner = new SeatingPlanCreator($permutations);
        $highest = $planner->highestHappinessChange($people);

        $this->write("Highest happiness change: " . $highest->happinessChange());
    }


}