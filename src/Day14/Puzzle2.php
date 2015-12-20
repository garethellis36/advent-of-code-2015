<?php
namespace Day14;

class Puzzle2
{
    use \ConsoleTrait, \InputLoaderTrait;

    public function __invoke()
    {
        $input = $this->loadInput("Day14/Puzzle1");

        $parser = new InstructionsParser();
        $herd = $parser->parse($input);

        $race = new Race($herd);
        $duration = 2503;
        $winner = $race->pointsWinnerAfter($duration);

        $this->write("Winner: " . $winner->name() . " with " . $winner->points() . " points");
    }
}