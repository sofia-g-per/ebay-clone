<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function signup(Request $request) {
        // dd($request->all());

        $userData = $request->all();

        //создание своего валидатора
        $validator = Validator::make($userData, [
            // | разделяет несколько правил валидации
            'email' => 'required|unique:users|email:rfc,dns,filter',
            'name' => 'required',
            'password' => 'required',
            'message' => 'required',
        ]);

        //валидация данных формы
        //если данные заполнены не корректно
        if ( $validator->fails()) {
            return redirect( route('signup-page') )
            ->withErrors($validator)
            ->withInput();
        }

        //сохранение данных в БД
        $user = new User();
        $user->name = $userData['name'];
        $user->email = $userData['email'];
        $user->password = bcrypt($userData['password']);
        $user->contacts = $userData['message'];

        $user->save();

        return redirect(route('main-page'));

    }
}
