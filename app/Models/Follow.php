<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    public function followers()
    {
        return $this -> hasOne(Admin::class, 'id', 'userid');
    }

    public function profile_pic_followers()
    {
        return $this -> hasOne(Image::class, 'profile_pic_id', 'userid');
    }

    public function following()
    {
        return $this -> hasOne(Admin::class, 'id', 'follow');
    }

    public function profile_pic_following()
    {
        return $this -> hasOne(Image::class, 'profile_pic_id', 'follow');
    }

    public function news()
    {
        return $this -> hasMany(Image::class, 'userid', 'follow')->whereNull('profile_pic_id');
    }
}
