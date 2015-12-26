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
            return [];
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
        $steps = 0;
        if ($startString === $targetMolecule) {
            return $steps;
        }

        return $this->iterativelyGetPossibleReplacements($targetMolecule, $this->possibleReplacements($startString), 1);
    }

    private function iterativelyGetPossibleReplacements($targetMolecule, $possibles, $steps)
    {
        if (in_array($targetMolecule, $possibles)) {
            return $steps;
        }
        $steps++;
        foreach ($possibles as $possible) {
            $this->iterativelyGetPossibleReplacements($targetMolecule, $this->possibleReplacements($possible), $steps);
        }
    }
}
