<?php

namespace Day17;

class Calculator
{
    private $containers = [];

    public function combinations($total, array $containers)
    {
		$this->containers = $containers;
        $combinations = $this->iterate($total, array_keys($containers));
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
    private function iterate($total, $array, $combinations = [], $temp = [])
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
                $combinations = $this->iterate($total, $copy, $combinations, $add);

            } else {

                $add = array_merge($temp, array($elem[0]));
                sort($add);
                if ($this->sum($add) == $total && !in_array($add, $combinations)) {
                    $combinations[] = $add;
                }
            }
        }

        return array_filter($combinations, function ($combination) use ($total) {
            return $this->sum($combination) == $total;
        });
    }

	private function sum($array)
	{
		$sum = 0;
		foreach ($array as $elem) {
			$sum += $this->containers[$elem];
		}
		return $sum;
	}
}
