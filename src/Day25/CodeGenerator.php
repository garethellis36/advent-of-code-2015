<?php

namespace Day25;

class CodeGenerator
{
    /**
     * @var CodeCoordinateMapper
     */
    private $mapper;
    /**
     * @var int
     */
    private $startCode;
    /**
     * @var int
     */
    private $multiplier;
    /**
     * @var int
     */
    private $divisor;

    public function __construct(CodeCoordinateMapper $mapper, $startCode = 20151125, $multiplier = 252533, $divisor = 33554393)
    {
        $this->mapper = $mapper;
        $this->startCode = $startCode;
        $this->multiplier = $multiplier;
        $this->divisor = $divisor;
    }

    public function codeAt($row, $column)
    {
        $sequenceNumber = $this->mapper->getSequenceNumberFromCodeCoordinates($row, $column);

        $code = $this->startCode;
        for ($i = 2; $i <= $sequenceNumber; $i++) {
            $code = ($code * $this->multiplier) % $this->divisor;
        }

        return $code;
    }
}
