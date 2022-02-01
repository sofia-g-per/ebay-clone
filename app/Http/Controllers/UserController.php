<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function login( Request $request ) {
        // dd($request->all());

        $userInfo = $request->only('email', 'password');

        $validator = Validator::make($userInfo, [
            'email'=>'required|email:rfc,dns,filter',
            'password'=>'required',
        ]);

        //если одно из полней не заполнено
        if ($validator->fails()) {
            return redirect( route('login-page') )
                ->withErrors($validator)
                ->withInput();
        }

        if(Auth::attempt($userInfo)) {
            return redirect(route('main-page'));
        }

        //если  не прошла авторизация (пароль не соответствует почте)
        return redirect(route('login-page'))
        ->withErrors(['auth_error' => 'Email или пароль введены не корректно'])
        ->withInput();
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
