<?php

namespace Day12;

class Calculator
{
    public function sum($string)
    {
        return $this->iterate(json_decode($string));
    }

    public function sumIgnoringRed($string)
    {
        return $this->iterate(json_decode($string), true);
    }

    private function iterate($array, $ignoreRed = false)
    {
        $total = 0;
        foreach ($array as $element) {
            if ($element === "red" && $ignoreRed && !is_array($array)) {
                return 0;
            }
            if (is_array($element) || $element instanceof \stdClass) {
                $total += $this->iterate($element, $ignoreRed);
            } elseif (is_int($element)) {
                $total += $element;
            }
        }
        return $total;
    }
}
