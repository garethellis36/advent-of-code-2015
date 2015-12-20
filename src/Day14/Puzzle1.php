<?php
namespace Day14;

class Puzzle1
{
    use \ConsoleTrait, \InputLoaderTrait;

    public function __invoke()
    {
        $input = $this->loadInput("Day14/Puzzle1");

        $parser = new InstructionsParser();
        $herd = $parser->parse($input);

        $race = new Race($herd);
        $duration = 2503;
        $winner = $race->winnerAfter($duration);

        $this->write("Winner: " . $winner->name() . ", who has flown " . $winner->distanceAfter($duration));
    }
}