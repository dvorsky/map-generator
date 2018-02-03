<?php

namespace App\Models;

use MapGenerator\PerlinNoiseGenerator as NoiseGen;

class Map
{
    public $map;
    public $size;

    public function __construct(int $size_x, int $size_y, string $seed = 'default', float $persistence = 0.8)
    {
        $size = ($size_x >= $size_y ? $size_x : $size_y);

        $generator = new NoiseGen();
        $generator->setSize($size); //heightmap size: $size x $size
        $generator->setPersistence($persistence); //map roughness
        $generator->setMapSeed($seed); //optional
        $height_map = $generator->generate();

        $map = [];

        for ($y = 0; $y < $size_y; $y++) {
            $row = [];
            for ($x = 0; $x < $size_x; $x++) {
                array_push($row, $height_map[$y][$x]);
            }

            array_push($map, $row);
        }

        $this->map = $map;
        $this->size = [
            'x' => $size_x,
            'y' => $size_y,
        ];


        return $map;
    }

    public function render()
    {
        $render = [];
        foreach ($this->map as $row) {
            $render_row = [];
            foreach ($row as $cell) {
                switch (true) {
                    case $cell < 1.2:
                        array_push($render_row, 0);
                        break;
                    case $cell < 1.3:
                        array_push($render_row, 1);
                        break;
                    case $cell < 1.5:
                        array_push($render_row, 2);
                        break;
                    case $cell < 1.7:
                        array_push($render_row, 3);
                        break;
                    case $cell < 1.9;
                        array_push($render_row, 4);
                        break;
                    case $cell >= 1.9;
                        array_push($render_row, 5);
                        break;
                }
            }
            array_push($render, $render_row);
        }

        return $render;
    }
}
