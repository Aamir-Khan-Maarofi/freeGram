<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //This user can follow many profiles
    public function following(){
        return $this->belongsToMany(UserProfile::class, 'user_profiles_id', 'user_id' );
    }

    //User can have many posts in their prfile
    public function posts(){
        return $this->hasMany(UserPosts::class)->orderBy('created_at', "DESC");
    }

    //User must have only one profile
    public function userProfile(){
        return $this->hasOne(UserProfile::class);
    }

    //Eloquent Model Evnets - This creates demo profile for new users
    protected static function boot(){
        parent::boot();

        static::created(function($user){
            $user->userProfile()->create([
                'title'=>$user->username,
                //'image'=> 'profile/demo_profile.png'
                ]);
        });
    }
}
