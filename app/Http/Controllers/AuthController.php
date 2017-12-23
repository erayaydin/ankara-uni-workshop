<?php

namespace App\Http\Controllers;




use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function doLogin(AuthLoginRequest $request) {

        if(auth()->attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]))
            return redirect()->route('home.index');
        else
            return redirect()->back()->withInput()->withErrors(['email' => "E-Posta adresi veya parola hatalı!"]);

    }

    public function logout() {
        auth()->logout();

        return redirect()->route('home.index');
    }
    
    public function register() {
        return view('auth.register');
    }

    public function doRegister(AuthRegisterRequest $request) {

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect()->route('auth.login');

    }
}
