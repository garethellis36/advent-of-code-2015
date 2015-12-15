<?php

namespace Day4;

class HashGenerator
{
    public function generateHash($secret, $integer, callable $hashingFunction)
    {
        return $hashingFunction($secret . $integer);
    }
}
