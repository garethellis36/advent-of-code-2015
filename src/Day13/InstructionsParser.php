<?php

namespace Day13;

class InstructionsParser
{
    private $names = [];
    private $happinessChanges = [];

    public function parse($instructions, $me = false)
    {
        $this->getNamesAndHappinessChanges(array_map("trim", explode(PHP_EOL, $instructions)), $me);

        $people = [];
        foreach ($this->names as $name) {
            $people[] = new Person($name, $this->happinessChanges[$name]);
        }


        return $people;
    }

    private function getNamesAndHappinessChanges($instructions, $me = false)
    {
        if ($me) {
            $this->names[] = $me;
        }

        foreach ($instructions as $instruction) {

            if (empty(trim($instruction))) {
                continue;
            }

            $parts = explode(" ", $instruction);

            $change = (int)($parts[2] == "gain" ? $parts[3] : (0 - $parts[3]));

            $name = $parts[0];
            $otherPerson = str_replace(".", "", $parts[10]);
            if (!in_array($name, $this->names)) {
                $this->names[] = $name;
            }

            if (!isset($this->happinessChanges[$name][$otherPerson])) {
                $this->happinessChanges[$name][$otherPerson] = $change;
            }

            $this->happinessChanges[$me][$name] = 0;
            $this->happinessChanges[$name][$me] = 0;
        }
    }
}
