<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use App\Http\Resources\CartResource;
use App\Http\Resources\UserResource;

class UserApiController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
        ]);
        if(!auth()->attempt($credentials)){
            return response()->json(['status' => 'Login Failed']);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response()->json([
            'status' => 'Login Successful',
            'token' => $accessToken
        ]);
    }

    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
        ]);

        $validateData["password"] = bcrypt($validateData["password"]);
        $user = User::create($validateData);
        Cart::create([
            "user_id" => $user->id
        ]);

        return response()->json(["status" => "Register Success"]);
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        auth()->guard('web')->logout();
    }

    public function index()
    {
        return User::all();
    }

    public function cart(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email:dns',
        ]);

        if($request->input('email') != auth()->user()->email) {
            return response()->json([
                'status' => 'false',
                'message' => 'Email Unauthenticate'
            ]);
        }
        // $user = User::where('email', $request->input('email'));
        // dd($user);

        $datas = CartDetail::where("cart_id", auth()->user()->cart->id)->get();
        if(count($datas) == 0) {
            return response()->json([
                'data' => [],
                'user_id' => new UserResource(auth()->user())
            ]);
        }

        return response()->json([
            'data' => CartResource::collection($datas),
            'user_id' => new UserResource(auth()->user())
        ]);

        // return response()->json([
        //     'data' => $datas
        // ]);
    }
}
