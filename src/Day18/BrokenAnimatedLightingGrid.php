<?php

namespace Day18;

class BrokenAnimatedLightingGrid extends AnimatedLightingGrid
{
    private $brokenLights = [
        "1-1"
    ];

    public function __construct(array $lights, $horizontalSize = 100, $verticalSize = 100)
    {
        $this->defaultBrokenLights($horizontalSize, $verticalSize);
        $lights = $this->getBrokenLights($lights);
        parent::__construct($lights, $horizontalSize, $verticalSize);
    }

    public function lights(array $lights)
    {
        parent::lights($this->getBrokenLights($lights));
    }

    private function getBrokenLights($lights)
    {
        return array_merge($lights, $this->brokenLights);
    }

    /**
     * @param $horizontalSize
     * @param $verticalSize
     */
    private function defaultBrokenLights($horizontalSize, $verticalSize)
    {
        $this->brokenLights += ["{$horizontalSize}-1",
            "1-{$verticalSize}",
            "{$horizontalSize}-{$verticalSize}"
        ];
    }

}
