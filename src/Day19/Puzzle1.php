<?php
/**
 * Created by PhpStorm.
 * User: garethellis
 * Date: 25/12/2015
 * Time: 20:28
 */

namespace Day19;


class Puzzle1
{
    use \InputLoaderTrait, \ConsoleTrait;

    public function __invoke()
    {
        $parser = new InstructionsParser();
        $parsed = $parser->parse($this->loadInput("Day19/Puzzle1"));

        $runner = new ReplacementRunner($parsed['replacements']);
        $possibles = $runner->possibleReplacements($parsed['molecule']);

        $this->write("Number of possibles: " . count($possibles));
    }

}