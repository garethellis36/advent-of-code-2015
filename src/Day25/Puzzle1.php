<?php
/**
 * Created by PhpStorm.
 * User: garethellis
 * Date: 27/12/2015
 * Time: 12:36
 */

namespace Day25;


class Puzzle1
{
    use \ConsoleTrait;

    public function __invoke()
    {
        $mapper = new CodeCoordinateMapper();
        $generator = new CodeGenerator($mapper);

        $this->write("Code: " . $generator->codeAt(2981, 3075));
    }

}