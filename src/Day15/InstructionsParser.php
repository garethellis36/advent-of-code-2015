<?php

namespace Day15;

class InstructionsParser
{
	/**
	 * @param $input
	 * @return Larder
	 */
	public function parse($input)
	{
		$larder = new Larder();
		foreach (explode(PHP_EOL, $input) as $ingredientDescription) {

			$pattern = '/(?<name>[A-Z][a-z]+): capacity (?<capacity>-?[0-9]+), durability (?<durability>-?[0-9]+), flavor (?<flavor>-?[0-9]+), texture (?<texture>-?[0-9]+), calories (?<calories>-?[0-9]+)/';

			preg_match($pattern, $ingredientDescription, $matches);

			$larder[] = new Ingredient(
				$matches["name"],
				$matches["capacity"],
				$matches["durability"],
				$matches["flavor"],
				$matches["texture"],
				$matches["calories"]
			);
		}
		return $larder;
	}
}

