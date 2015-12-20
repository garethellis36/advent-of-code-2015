<?php

namespace Day13;

class InstructionsParser
{
    private $names = [];
    private $happinessChanges = [];

    public function parse($instructions)
    {
        $this->getNamesAndHappinessChanges(explode(PHP_EOL, $instructions));

        $people = [];
        foreach ($this->names as $name) {
            $people[] = new Person($name, $this->happinessChanges[$name]);
        }

        return $people;
    }

    private function getNamesAndHappinessChanges($instructions)
    {
        foreach ($instructions as $instruction) {

            $parts = explode(" ", $instruction);

            $change = (int)($parts[2] == "gain" ? $parts[3] : -$parts[1]);

            $name = $parts[0];
            $otherPerson = str_replace(".", "", $parts[10]);
            if (!in_array($name, $this->names)) {
                $this->names[] = $name;
            }

            if (!isset($this->happinessChanges[$name][$otherPerson])) {
                $this->happinessChanges[$name][$otherPerson] = $change;
            }
        }
    }
}
