<?php

namespace App\Http\Controllers;

use App\Models\UserPosts;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager\make;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Return posts of users the user is following
    public function index(){
        $users = auth()->user()->following()->pluck('user_profiles.user_id');

        $posts = UserPosts::whereIn('user_id', $users)->latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function show(\App\Models\UserPosts $post){
        return view('posts.show', compact('post'));
    }

    public function store(){

        $data = request()->validate([
            #All other fields if any, do not need validation. Use 'another' => ''
            'another' => '',
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        //store the image - public is driver for local storage. e.g s3 for amazon s3
        $imagePath = request('image')->store('uploads', 'public');

        //Resize and save the image using intervension/image
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        //Create an entry in database
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        //Redirect the user to their profile
        return redirect('/profile/'. auth()->user()->id);


    }
}
