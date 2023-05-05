<?php

namespace App\Http\Controllers\API\Admin;

class Line
{
    public $difference = 0.1;
    public $a;
    public $b;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function isBelong($point)
    {
        $x1 = $this->a['x'];
        $y1 = $this->a['y'];
        $x2 = $this->b['x'];
        $y2 = $this->b['y'];

        $dx = $x2 - $x1;
        $dy = $y2 - $y1;
        $along = (($point->x - $x1)*$dx + ($point->y - $y1)*$dy)/($dx * $dx + $dy * $dy);
        if($along <= 0) return sqrt(($point->x - $x1)*($point->x - $x1)+($point->y - $y1)*($point->y - $y1)) < $this->difference;
        elseif ($along >= 1) return sqrt(($point->x - $x2)*($point->x - $x2)+($point->y - $y2)*($point->y - $y2)) < $this->difference;
        else{
            $x = $x1 + $along * $dx;
            $y = $y1 + $along * $dy;
            return sqrt(($point->x - $x)*($point->x - $x)+($point->y - $y)*($point->y - $y)) < $this->difference;
        }
    }
}
