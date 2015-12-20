<?php

namespace Day12;


class Puzzle2
{
    use \ConsoleTrait;

    public function __invoke()
    {
        $input = file_get_contents(__DIR__ . "/../../input/Day12/Puzzle1");
        $calculator = new Calculator();
        $this->write("Total: " . $calculator->sumIgnoringRed($input));
    }
}