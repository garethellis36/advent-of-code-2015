<?php

namespace Day19;

class InstructionsParser
{
    public function parse($input)
    {
        list($replacements, $molecule) = explode(PHP_EOL . PHP_EOL, $input);

        $replacements = explode(PHP_EOL, $replacements);

        $replacementsArray = array();

        foreach ($replacements as &$replacement) {
            list($from, $to) = explode(" => ", $replacement);

            if (!isset($replacementsArray[$from])) {
                $replacementsArray[$from] = [];
            }

            $replacementsArray[$from][] = $to;
        }

        return [
            'replacements' => $replacementsArray,
            'molecule' => $molecule,
        ];
    }
}
