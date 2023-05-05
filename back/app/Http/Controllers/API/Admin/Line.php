<?php

namespace App\Http\Controllers\API\Admin;

class Line
{
    public $m;
    public $b;

    public function __construct($a, $b)
    {
        $this->m = ($a['y']-$b['y'])/($a['x']-$b['x']);
        $this->b = $a['y'] - $this->m*$a['x'];
    }

    public function distanceBetweenPoint($point)
    {
        return abs($this->m * $point['x'] - $point['y'] + $this->b)/sqrt($this->m * $this->m + 1);
    }
}
