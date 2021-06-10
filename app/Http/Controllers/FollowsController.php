<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function store(\App\Models\User $user){

        //return Auth::user()->following()->toggle($user->userProfile);
        return auth()->user()->following()->toggle($user->userProfile);

    }
}
