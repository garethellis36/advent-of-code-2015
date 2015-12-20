<?php

trait InputLoaderTrait
{
    public function loadInput($path)
    {
        return file_get_contents(__DIR__ . "/../input/" . $path);
    }
}