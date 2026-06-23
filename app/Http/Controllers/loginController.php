<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required', 
        ]);

        if(Auth::attempt($credentials))
        {
            $usertype=Auth()->user()->usertype;

            if($usertype=='user')
            {
                return redirect()->route('home');
            }
            else if($usertype=='admin')
            {
                //return view('admin/home');
                return redirect()->route('admin_home');
            }
        }
        return back()->withErrors([
            'email' => 'Invalid Email OR Password'
        ]);
    }

    public function homePage(){
        if(Auth::check()){
            return view('home');
        }
        else{
            return redirect()->route('welcome')->withErrors([
                'email' => 'Please Login'
            ]);
        }
    }

    public function adminHomePage(){
        if(Auth::check()){
            return view('admin/admin_home');
        }
        else{
            return redirect()->route('welcome')->withErrors([
                'email' => 'Please Login'
            ]);
        }
    }

    public function adminCategoriePage(){
        if(Auth::check()){
            return view('admin/admin_categories_list');
        }
        else{
            return redirect()->route('welcome')->withErrors([
                'email' => 'Please Login'
            ]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('welcome')->withErrors([
            'email' => 'Successful Logout'
        ]);
    }
}
