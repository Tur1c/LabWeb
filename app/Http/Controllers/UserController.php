<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index_register(){
        return view('account.register');
    }

    public function index_login(){
        return view('account.login');
    }

    public function register(Request $request){
        $validateData = $request->validate([
            'name' => 'required|',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]);

        $validateData["password"] = bcrypt($validateData["password"]);
        User::create($validateData);

        return redirect()->route('login_page');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(auth()->attempt($credentials)){
            return redirect()->route('home_page');
        } else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Email or password is incorrect']);
        }
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login_page');
    }
}
