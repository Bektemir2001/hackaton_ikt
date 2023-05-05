<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function getBadPoints():Response
    {
        $badPoints = DB::table('bad_points')
            ->where('status', '!=', 'completed')
            ->select('id', 'x', 'y')
            ->get();
        return response(['data' => $badPoints]);
    }

    public function getPoint($point):Response
    {
        $data = DB::table('bad_points')
            ->leftJoin('users', 'users.id', '=', 'bad_points.user_id')
            ->where('bad_points.id', $point)
            ->select('users.id as user_id', 'users.name as user_name',
                            'bad_points.x', 'bad_points.y')->get();
        return response(['data' => $data]);
    }
}
