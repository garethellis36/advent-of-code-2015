<?php

namespace Day13;

class Person
{
    private $name;

    private $happinessChanges;

    public function __construct($name, array $happinessChanges)
    {
        $this->name = $name;
        $this->happinessChanges = $happinessChanges;
    }

    public function name()
    {
        return $this->name;
    }

    public function happinessChange($name)
    {
        return isset($this->happinessChanges[$name]) ? $this->happinessChanges[$name] : null;
    }
}
