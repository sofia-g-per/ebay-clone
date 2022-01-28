<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function signup(Request $request) {
        // dd($request->all());

        //сохранение данных в БД
        $userData = $request->all();

        $user = new User();
        $user->name = $userData['name'];
        $user->email = $userData['email'];
        $user->password = bcrypt($userData['password']);
        $user->contacts = $userData['message'];

        $user->save();

    }
}
