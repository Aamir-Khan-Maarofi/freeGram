<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function profileImage(){
        $imagePath = ($this->image) ? $this->image : 'profile/demo_profile.png';
        return '/storage/'.$imagePath;
    }
}
