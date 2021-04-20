<?php


namespace App\Http\Controllers;

use App\User;

class UserController
{
    public static function getUsers()
    {
        $users = User::select('id', 'name', 'email')->get();
        return $users;
    }
}
