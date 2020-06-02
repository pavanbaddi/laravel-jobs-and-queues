<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function index(Request $request){
        $info = [];
        return view('remember_me.login', $info);
    }

    public function verify(Request $request){
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credential)){
            $user = User::where(["email" => $credential['email']])->first();
            // dd($user);
            Auth::login($user, true);

            return redirect(route('dashboard'));
        }
    }
}
