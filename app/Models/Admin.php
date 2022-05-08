<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public function profile_pic()
    {
        return $this -> hasOne(Image::class,'profile_pic_id', 'id');
    }

    public function images()
    {
        return $this -> hasMany(Image::class,'userid','id')->whereNull('profile_pic_id');
    }

    public function follows()
    {
        return $this -> hasMany(Follow::class, 'userid', 'id');
    }
}
