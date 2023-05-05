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
                            'bad_points.x', 'bad_points.y',
                    'bad_points.photo', 'bad_points.description', 'bad_points.created_at as date')->first();
        $likes = DB::table('bad_point_votes')
            ->where('point_id', $point)
            ->where('is_like', 1)
            ->count();
        $dislikes = DB::table('bad_point_votes')
            ->where('point_id', $point)
            ->where('is_like', 0)
            ->count();
        $data->likes = $likes;
        $data->dislikes = $dislikes;
        return response(['data' => $data]);
    }
}
