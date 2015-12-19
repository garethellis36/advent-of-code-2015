<?php

namespace Day12;

class Calculator
{
    public function sum($string)
    {
        $accounts = json_decode($string, true);
        return $this->iterate($accounts);
    }

    private function iterate(array $array)
    {
        $total = 0;
        foreach ($array as $element) {
            if (is_array($element)) {
                $total += $this->iterate($element);
            } elseif (is_int($element)) {
                $total += $element;
            }
        }
        return $total;
    }
}
