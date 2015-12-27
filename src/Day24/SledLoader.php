<?php

namespace Day24;

class SledLoader
{
    private $weights;

    private $totalWeight;

    public function __construct(array $weights)
    {
        $this->weights = $weights;

        $this->totalWeight = array_sum($weights);
    }

    public function optimalFrontLoading($sections = 3)
    {
        $waysofLoadingFront = $this->loadFront($sections);

        $min = array_reduce($waysofLoadingFront, function ($carry, $item) {

            $count = count($item);
            if (!$carry || $count < $carry) {
                return $count;
            }
            return $carry;

        });

        $filtered = array_filter($waysofLoadingFront, function($weights) use ($min) {
            return count($weights) === $min;
        });

        return array_reduce($filtered, function ($carry, $item) {

            if (!$carry || array_product($item) < $carry) {
                return $item;
            }
            return $carry;
        });
    }

    public function loadFront($sections = 3)
    {
        $weightPerSection = $this->totalWeight / $sections;

        //get all ways to load front
        $waysToLoadFront = $this->doLoad($this->weights, $weightPerSection);

        //go through each way to load front and check we have the right combination of weights to load the sides
        $lowestNumberOfWeights = null;
        foreach ($waysToLoadFront as $i => $wayToLoadFront) {

            if ($lowestNumberOfWeights && count($wayToLoadFront) > $lowestNumberOfWeights) {
                unset($waysToLoadFront[$i]);
                continue;
            }

            //check which weights we still have left after this way of loading the front
            $availableWeights = $this->weights;
            $availableWeights = array_filter($availableWeights, function ($weight) use ($wayToLoadFront) {
                return !in_array($weight, $wayToLoadFront);
            });

            //get ways to load a single side section with available weights
            $waysToLoadASideSection = $this->doLoad($availableWeights, $weightPerSection);

            //no ways to load it, this way to load front is not valid
            if (empty($waysToLoadASideSection)) {
                unset($waysToLoadFront[$i]);
                continue;
            }

            $count = count($wayToLoadFront);

            if ($lowestNumberOfWeights && $count > $lowestNumberOfWeights) {
                unset($waysToLoadFront[$i]);
                continue;
            }

            if (!$lowestNumberOfWeights || $count < $lowestNumberOfWeights) {
                $lowestNumberOfWeights = $count;
            }

        }

        return $waysToLoadFront;
    }

    private function doLoad(array $weights, $remainingWeight, array $sequence = [])
    {
        if ($remainingWeight === 0) {
            return [$sequence];
        }
        if (empty($weights)) {
            return [];
        }
        $container = array_shift($weights);
        $sequences = $this->doLoad($weights, $remainingWeight, $sequence);
        if ($container <= $remainingWeight) {
            $sequence[] = $container;
            $sequences = array_merge($sequences, $this->doLoad($weights, ($remainingWeight - $container), $sequence));
        }
        return $sequences;
    }
}
