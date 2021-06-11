<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $guarded = [];

    //A profile can have many followers who are users
    public function followers(){
        return $this->belongsToMany(User::class, 'user_userprofile', 'userprofile_id', 'user_id');
    }
    //One profile must be owned by one user
    public function user(){
        return $this->belongsTo(User::class);
    }


    //The profile image returned
    public function profileImage(){
        $imagePath = ($this->image) ? $this->image : 'profile/demo_profile.png';
        return '/storage/'.$imagePath;
    }
}
