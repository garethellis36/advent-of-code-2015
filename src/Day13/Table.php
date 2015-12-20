<?php

namespace Day13;

class Table
{
    private $people;

    public function __construct($people)
    {
        $this->people = $people;
    }

    public function happinessChange()
    {
        $people = $this->people;

        $change = 0;

        $numberOfPeople = count($people);
        for ($i = 0; $i < $numberOfPeople; $i++) {

            $person = $people[$i];

            $personToLeft = $i == 0 ? $people[$numberOfPeople - 1] : $people[$i - 1];
            $personToRight = $i == $numberOfPeople - 1 ? $people["0"] : $people[$i + 1];

            $change += $person->happinessChange($personToLeft->name());
            $change += $person->happinessChange($personToRight->name());
        }

        return $change;
    }
}
