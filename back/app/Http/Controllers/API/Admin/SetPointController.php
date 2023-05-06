<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\SectionRoad;
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
            'status' => '',
            'price' => '',
        ]);
        $badPoints = DB::table('bad_points')
        ->where('type', $data['type'])
        ->get();
        $line = new Line(['x' => floatval($data['x1']), 'y' => floatval($data['y1'])], ['x' => floatval($data['x2']), 'y' => floatval($data['y2'])]);

        foreach ($badPoints as $point)
        {
            if($line->isBelong(['x' => floatval($point->x), 'y' => floatval($point->y)]))
            {
                $point->update([
                    'status' => $data['status']
                ]);
            }
        }

        $section = SectionRoad::create($data);

        return response($section);
    }

}
