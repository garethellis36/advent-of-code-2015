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
    public function minimumNumberStepsForBuildingMolecule($targetMolecule)
    {
        $allElements = [];
        foreach ($this->replacements as $from => $toStrings) {
            $allElements[] = $from;
            $allElements = array_merge($allElements, $toStrings);
        }

        $pattern = "/(".implode("|", $allElements).")/";

        preg_match_all($pattern, $targetMolecule, $matches);

        $allElements = $matches[0];
        $numberElements = count($allElements);

        //elements with 'Rn' or 'Ar'
        $bracketElements = array_filter($allElements, function ($element) {
            return (strpos($element, 'Rn') !== false && strpos($element, 'Ar') !== false);
        });
        $numberBracketElements = count($bracketElements);

        //elements with 'Y'
        $commaElements = array_filter($allElements, function ($element) {
            return (strpos($element, 'Y') !== false);
        });
        $numberCommaElements = count($commaElements);

        return $numberElements
                - $numberBracketElements
                - 2 * $numberCommaElements
                - 1;
    }
}
