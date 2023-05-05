<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfileController extends Controller
{
    public function index(User $user): Response
    {
        return response($user);
    }
}
