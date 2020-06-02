<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request){
        
        if( empty(Auth::user()) ){
            return redirect(route('remember-me.logout'));
        }

        return view('remember_me.dashboard', []);
    }
}
