<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(){
        return view('posts.create');
    }

    public function store(){

        $data = request()->validate([
            #All other fields if any, do not need validation. Use 'another' => ''
            'another' => '',
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        //Create an entry in database
        auth()->user()->posts()->create($data);
        //\App\Models\UserPosts::create($data);

        dd(request()->all());

    }
}
