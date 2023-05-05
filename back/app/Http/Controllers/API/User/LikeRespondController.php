<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\BadPointVotes;
use Illuminate\Http\Request;

class LikeRespondController extends Controller
{
    public function like(Request $request)
    {
        $data = $request->validate([
            'point_id' => '',
            'user_id' => '',
            'is_like' => ''
        ]);
        BadPointVotes::create($data);
        return response(['message' => 'success']);
    }

    public function updateLike(Request $request){
        $data = $request->validate(
            [
                'id' => '',
                'type' => ''
            ]
        );
        $like = BadPointVotes::where('id', $data['id'])->first();
        if($like->is_like == $data['type'])
        {
            $like->delete();
            return response(['message' => 'deleted']);
        }
        else {
            $like->update(['is_like' => !$like->is_like]);
            return response(['error' => 'error']);
        }
    }


}
