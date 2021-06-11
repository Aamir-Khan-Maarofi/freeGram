<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager\make;

class ProfilesController extends Controller
{

    public function index(\App\Models\User $user){

        //laravel does this next line job with the argument passed above
        #$userRetreived = User::findOrFail($user);
        #dd($userRetreived);

        //If the user is authenticated (someone is logged in), then return whether authenticated user is attached
        //to this current viewed user, otherwise return false
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        return view('profiles.index', compact('user', 'follows'));
    }

    public function edit(\App\Models\User $user){

        $this->authorize('update', $user->userProfile);

        return view('profiles.edit', compact('user'));

    }


    public function update(\App\Models\User $user){

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);

        if(request('image')){
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();

            $imageArray = [['image' => $imagePath]];
        }


        auth()->user()->userprofile->update(array_merge(
            $data,
            $imageArray ?? []
        ));


        return redirect("/profile/{$user->id}");

    }
}
