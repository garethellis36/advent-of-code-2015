<?php

namespace Day14;

class InstructionsParser
{
    public function parse($reindeerSpecs)
    {
        $herd = [];
        foreach (explode(PHP_EOL, $reindeerSpecs) as $reindeerSpec) {
            $pattern = '/(?<name>[A-Z][a-z]+) can fly (?<speed>[0-9]+) km\/s for (?<durationOfFlight>[0-9]+) seconds, but then must rest for (?<restTime>[0-9]+) seconds./';
            preg_match($pattern, $reindeerSpec, $matches);
            $herd[] = new Reindeer($matches['name'], $matches['speed'], $matches['durationOfFlight'], $matches['restTime']);
        }
        return $herd;
    }
}
