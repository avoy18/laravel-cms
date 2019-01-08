<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = [
        'name', 'body'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function categories(){
        return $this->belongsToMany('App\Category');
    }

    public function images(){
        return $this->morphMany('App\Image', 'imageable');
    }
}
