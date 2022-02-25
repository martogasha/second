<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function log(Request $request)
    {
        $user = User::where('email',$request->email)->first();

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            if ($user->role ==0){
                return redirect(url('admin'));
            }
            else{
                return redirect(url('checkout'));
            }
        }
        else{
            return redirect()->back()->with('error', 'CREDENTIALS DOES NOT MATCH');
        }
    }
}
