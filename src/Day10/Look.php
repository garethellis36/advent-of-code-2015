<?php

namespace Day10;

class Look
{
	public function say($input)
	{
		$output = "";

		$input = str_split($input);
		foreach ($input as $k => $number) {

			if ($k > 0 && $number == $input[$k-1]) {
				continue;
			}

			if (!isset($input[$k+1])) {
				$output .= "1" . $number;
				continue;
			}

			$repetitions = "1";
			$i = $k + 1;
			while (true ) {

				if ($number == $input[$i]) {
					$repetitions++;
					$i++;
					continue;
				}
				break;
			}

			$output .= (string)$repetitions . (string)$number;
		}

		return $output;
	}
}

