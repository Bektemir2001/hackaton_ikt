<?php

namespace App\Http\Controllers\API\User;

use App\Enums\RoadTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\BadPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RespondController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'x' => '',
            'y' => '',
            'photo' => '',
            'description' => '',
            'user_id' => '',
            'type' => '',
        ]);

        try {
            $photo = Storage::disk('public')->put('images', $data['photo']);
            BadPoint::create([
                'x' => $data['x'],
                'y' => $data['y'],
                'photo' => $photo,
                'user_id' => $data['user_id'],
                'type' => $data['type'],
                'description' => $data['description']
            ]);
//            {
//                'x' : '',
//                'y' : '',
//                'photo' : '',
//                'user_id' : '',
//                'type' : '',
//                'description' : ''
//            }
            return response(['message' => 'success']);
        }
        catch (\Exception $e){
            return response(['error' => $e->getMessage()])->setStatusCode(500);
        }


    }

}
