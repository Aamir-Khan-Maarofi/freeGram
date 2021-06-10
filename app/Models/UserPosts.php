<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPosts extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Post must have an owner
    public function user(){
        return $this->belongsTo(User::class);
    }
}
