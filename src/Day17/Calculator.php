<?php

namespace Day17;

class Calculator
{
    private $containers = [];

    public function combinations($total, array $containers)
    {
        $combinations = $this->iterate($total, $containers);
        return count($combinations);
    }

    /**
     * http://stackoverflow.com/questions/12837431/find-combinations-sum-of-elements-in-array-whose-sum-equal-to-a-given-number
     *
     * @param $array
     * @param array $combinations
     * @param array $temp
     * @return array
     */
    private function iterate($sum, $array, $combinations = [], $temp = [])
    {
        if (count($temp) && !in_array($temp, $combinations)) {
            $combinations[] = $temp;
        }

        $count = count($array);
        for ($i = 0; $i < $count; $i++) {

            $copy = $array;
            $elem = array_splice($copy, $i, 1);

            if (count($copy) > 0) {

                $add = array_merge($temp, array($elem[0]));
                sort($add);
                $combinations = $this->iterate($sum, $copy, $combinations, $add);

            } else {

                $add = array_merge($temp, array($elem[0]));
                sort($add);
                if (array_sum($combinations) == $sum) {
                    $combinations[] = $add;
                }
            }
        }

        return array_filter($combinations, function ($combination) use ($sum) {
            return array_sum($combination) == $sum;
        });
    }
}
