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

        $remember_me  = ( !empty( $request->remember_me ) )? TRUE : FALSE;

        // dd($remember_me);

        if(Auth::attempt($credential)){
            $user = User::where(["email" => $credential['email']])->first();
            
            // Here 
            Auth::login($user, $remember_me);

            return redirect(route('dashboard'));
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect(route('remember-me.login'));
    }
}
