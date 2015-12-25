<?php

namespace Day19;

class ReplacementRunner
{
    /**
     * @var array
     */
    private $replacements;

    public function __construct(array $replacements)
    {
        $this->replacements = $replacements;
    }

    public function possibleReplacements($string)
    {
        $possibles = [];
        foreach ($this->replacements as $from => $toStrings) {

            foreach ($toStrings as $to) {
                $positions = $this->strpos_multiple($string, $from);

                foreach ($positions as $position) {
                    $newString = substr_replace($string, $to, $position, strlen($from));
                    if (!in_array($newString, $possibles)) {
                        $possibles[] = $newString;
                    }
                }
            }
        }

        return $possibles;
    }

    private function strpos_multiple($haystack, $needle)
    {
        if (strpos($haystack, $needle) === false) {
            return false;
        }

        $s = 0;
        $i = 0;

        $aStrPos = [];
        while ($i !== false) {

            $i = strpos($haystack, $needle, $s);

            if (is_integer($i)) {
                $aStrPos[] = $i;
                $s = $i + strlen($needle);
            }
        }

        return $aStrPos;
    }

    use \ConsoleTrait;

    /**
     * Reduce $molecule to $initial
     *
     * @param $startString
     * @param $molecule
     * @return int The number of steps required to reduce $molecule to $initial
     */
    public function minimumNumberStepsForBuildingMolecule($startString, $targetMolecule)
    {
        if ($targetMolecule == $startString) {
            return 0;
        }

        $minSteps = 1000000;
        foreach ($this->replacements as $to => $fromStrings) {

            foreach ($fromStrings as $from) {

                $start = 0;
                $positions = [];

                while (($pos = strpos($targetMolecule, $from, $start)) !== false) {
                    $positions[] = $pos;
                    $start = $pos + 1;
                }

                foreach ($positions as $position) {

                    $newString = substr_replace($targetMolecule, $to, $position, strlen($from));
                    $steps = $this->minimumNumberStepsForBuildingMolecule($startString, $newString) + 1;

                    if ($steps < $minSteps) {
                        $minSteps = $steps;
                    }
                }

            }

        }
        return $minSteps;
    }
}
