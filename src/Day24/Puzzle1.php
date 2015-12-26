<?php
/**
 * Created by PhpStorm.
 * User: garethellis
 * Date: 26/12/2015
 * Time: 22:38
 */

namespace Day24;


class Puzzle1
{
    use \ConsoleTrait, \InputLoaderTrait;

    public function __invoke()
    {
        \ini_set("memory_limit", "4G");

        $input = $this->loadInput("Day24/Puzzle1");

        $loader = new SledLoader(explode(PHP_EOL, $input));

        $optimal = $loader->optimalFrontLoading();

        $this->write("Optimal: " . implode(',', $optimal));
        $this->write("QE: " . array_product($optimal));
    }

}