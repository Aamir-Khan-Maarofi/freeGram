<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilesController extends Controller
{
    public function index($user){
        $userRetreived = User::find($user);
        #dd($userRetreived);
        return view('home', [
            'user' => $userRetreived,
        ]);
    }
}
