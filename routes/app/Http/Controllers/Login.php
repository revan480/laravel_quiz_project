<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Login extends Controller
{
    //create validation for login   
    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);
        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );
        if (Auth::attempt($user_data)) {
            return redirect('welcome');
        } else {
            return back()->with('error', 'Wrong Login Details');
        }
    }
    //if user is logged in, do not let him go back to login page
    public function index()
    {
        if (Auth::check()) {
            return redirect('welcome');
        }
        return view('login');
    }
    //logout user
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    


}

