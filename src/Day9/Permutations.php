<?php

namespace Day9;

class Permutations
{
	/**
	 * http://stackoverflow.com/questions/5506888/permutations-all-possible-sets-of-numbers
	 *
	 * @param array $items
	 * @param array $perms
	 * @return array
	 */
	public function calculate(array $items, $perms = [])
	{
		if (empty($items)) {
			$return = array($perms);
		}  else {
			$return = array();
			for ($i = count($items) - 1; $i >= 0; --$i) {
				$newitems = $items;
				$newperms = $perms;
				list($foo) = array_splice($newitems, $i, 1);
				array_unshift($newperms, $foo);
				$return = array_merge($return, $this->calculate($newitems, $newperms));
			}
		}
		return $return;
	}
}

