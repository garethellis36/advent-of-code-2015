<?php

namespace Day25;

class CodeCoordinateMapper
{
    public function getSequenceNumberFromCodeCoordinates($row, $column)
    {
        $sequenceNumber = 1;

        if ($row == 1 && $column == 1) {
            return $sequenceNumber;
        }

        $nextRow = 1;
        $nextCol = 1;

        $firstRowForThisDiagonalSet = 0;

        while (true) {

            if ($nextRow == 1) {
                $firstRowForThisDiagonalSet++;
            }

            $sequenceNumber++;

            list($nextRow, $nextCol) = $this->nextCoordinate($nextRow, $nextCol, $firstRowForThisDiagonalSet);

            if ($nextRow == $row && $nextCol == $column) {
                break;
            }
        }

        return $sequenceNumber;
    }

    private function nextCoordinate($row, $col, $firstRowForThisDiagonalSet)
    {
        if ($row == 1) {
            return [$firstRowForThisDiagonalSet + 1, 1];
        }
        return [$row-1, $col+1];
    }
}
