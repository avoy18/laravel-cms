<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // protected $uploads = 'user_uploads/avatars/';
    protected $fillable = [
        // 'path',
        // 'imageable_id',
        // 'imageable_type'
        'path'
    ];
    public function imageable(){
        return $this->morphTo();
    }

    // public function getFileAttribute($image){
    //     return $this->uploads . $image;
    // }

    
}
