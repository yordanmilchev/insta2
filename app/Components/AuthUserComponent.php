<?php


namespace App\Components;



use App\Models\Admin;

class AuthUserComponent
{
    public static function getAuthUser()
    {
        $LoggedUserInfo = Admin::where('id', session('LoggedUser'))
            ->with('images')
            ->with('profile_pic')
            ->with('follows')
            ->get()
            ->first();

        return $LoggedUserInfo;
    }
}

