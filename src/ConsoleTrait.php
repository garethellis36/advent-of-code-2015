<?php

trait ConsoleTrait
{
    public function write($string, $lineBreaks = 1)
    {
        echo $string . str_repeat(PHP_EOL, $lineBreaks);
    }
}