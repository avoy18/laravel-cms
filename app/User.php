<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_active', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function setPasswordAttribute($password){
    //     if(!empty($password)){
    //         $this->attributes['password'] = bcrypt($password);
    //     }
    // }

    public function role(){
      return $this->belongsTo('App\Role');
    }

    public function image(){
        return $this->morphOne('App\Image', 'imageable');
    }

    public function adminCheck(){
        if($this->role){

            if($this->role->name == 'Administrator'){
                return true;

            }
        }
        return false;
        
    }
}
