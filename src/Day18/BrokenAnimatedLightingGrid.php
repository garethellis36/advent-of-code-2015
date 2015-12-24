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
        $lights = array_merge($lights, $this->getBrokenLights());
        parent::__construct($lights, $horizontalSize, $verticalSize);
    }

    public function lights(array $lights)
    {
        parent::lights(array_merge($lights, $this->getBrokenLights()));
    }

    public function getBrokenLights()
    {
        return $this->brokenLights;
    }

    /**
     * @param $horizontalSize
     * @param $verticalSize
     */
    private function defaultBrokenLights($horizontalSize, $verticalSize)
    {
        $this->brokenLights = array_merge($this->brokenLights, [
            "{$horizontalSize}-1",
            "1-{$verticalSize}",
            "{$horizontalSize}-{$verticalSize}"
        ]);
    }

}
