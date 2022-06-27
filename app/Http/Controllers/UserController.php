<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

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
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]);

        $validateData["password"] = bcrypt($validateData["password"]);
        $user = User::create($validateData);
        Cart::create([
            "user_id" => $user->id
        ]);

        return redirect()->route('login_page');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8'
        ]);

        if(auth()->attempt($credentials)){
            if($request->has('checkbox')) {
                Cookie::queue('login_cookie', $request->email, 5);
            }
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
