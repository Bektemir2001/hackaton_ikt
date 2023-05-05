<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function getBedPoints():Response
    {
        $badPoints = DB::table('bad_points')
            ->where('status', 'not_viewed')
            ->select('id', 'x', 'y')
            ->get();
        return response($badPoints);
    }
}
