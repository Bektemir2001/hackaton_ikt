<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    public function register(Request $request): Response
    {
        $data = $request->validate([
            'name' => '',
            'email' => '',
            'password' => ''
        ]);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);
        $user = User::where('id', $user->id)->first();
        return response($user);
    }
}
