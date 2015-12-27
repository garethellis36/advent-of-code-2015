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
        $molecule = str_replace("Rn", "", $molecule);
        $molecule = str_replace("Ar", "", $molecule);
        $molecule = str_replace("Y", "", $molecule);

        $allElements = array_keys($this->replacements);
        $numberElements = 0;
        foreach ($allElements as $element) {
            $numberElements += substr_count($molecule, $element);
        }

        return $numberElements
            + $this->getNumberOfBracketElements($molecule)
            + $this->getNumberOfCommaElements($molecule);
    }

    public function getNumberOfBracketElements($molecule)
    {
        $molecule = str_replace("Rn", "(", $molecule);
        $molecule = str_replace("Ar", "(", $molecule);
        return substr_count($molecule, "(") + substr_count($molecule, ")");
    }

    public function getNumberOfCommaElements($molecule)
    {
        $molecule = str_replace("Y", ",", $molecule);
        return substr_count($molecule, ",");
    }

    public function minimumNumberStepsForBuildingMolecule($targetMolecule)
    {
        return $this->getNumberOfElements($targetMolecule)
            - $this->getNumberOfBracketElements($targetMolecule)
            - 2*$this->getNumberOfCommaElements($targetMolecule)
            - 1;
    }
}
