<?php
/**
 * Created by PhpStorm.
 * User: garethellis
 * Date: 25/12/2015
 * Time: 20:28
 */

namespace Day19;


class Puzzle2
{
    use \InputLoaderTrait, \ConsoleTrait;

    public function __invoke()
    {
        $parser = new InstructionsParser();
        $parsed = $parser->parse($this->loadInput("Day19/Puzzle1"));

        $runner = new ReplacementRunner($parsed['replacements']);

        $steps = $runner->minimumNumberStepsForBuildingMolecule($parsed['molecule']);

        $this->write("Steps: " . $steps);
    }

}