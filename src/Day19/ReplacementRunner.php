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

    public function getNumberOfElements($molecule)
    {
        preg_match_all('/([A-Z][a-z]?)/', $molecule, $matches);
        return count($matches[0]);
    }

    public function getNumberOfBracketElements($molecule)
    {
        return substr_count($molecule, "Rn") + substr_count($molecule, "Ar");
    }

    public function getNumberOfCommaElements($molecule)
    {
        return substr_count($molecule, "Y");
    }

    public function minimumNumberStepsForBuildingMolecule($targetMolecule)
    {
        return $this->getNumberOfElements($targetMolecule)
            - $this->getNumberOfBracketElements($targetMolecule)
            - 2*$this->getNumberOfCommaElements($targetMolecule)
            - 1;
    }
}
