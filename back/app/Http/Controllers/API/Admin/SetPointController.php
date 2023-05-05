<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SetPointController extends Controller
{
    public function setPoint(Request $request):Response
    {
        $data = $request->validate([
            'x1' => '',
            'y1' => '',
            'x2' => '',
            'y2' => '',
            'contractor_id' => '',
            'start_date' => '',
            'end_date' => '',
            'type' => '',
            'lifetime' => '',
            'status' => ''
        ]);
        $badPoints = DB::table('bad_points')
        ->where('type', $data['type'])
        ->get();
        $line = new Line([floatval($data['x1']), floatval($data['y1'])], [floatval($data['x2']), floatval($data['y2'])]);

        foreach ($badPoints as $point)
        {
            if($line->isBelong([floatval($point->x), floatval($point->y)]))
            {
                $point->update([
                    'status' => $data['type']
                ]);
            }
        }

        return response();
    }

}
