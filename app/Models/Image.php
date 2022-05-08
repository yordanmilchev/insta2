<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(Admin::class, 'id', 'userid');
    }

    public function profile_pic()
    {
        return $this->hasOne(Image::class, 'profile_pic_id', 'userid');
    }
}
