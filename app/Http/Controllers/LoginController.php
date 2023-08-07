<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function signIn(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if(Auth::attempt($credentials)){
            return response()->json(['status' => true, 'message' => 'Success']);
        }
        return response()->json(['status' => false, 'message' => 'Fail']);
    }
}
