<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $guard = 'admin';
    protected $redirectTo = '/admin';

    //Show Login Page
    public function index(){
        if (Auth::user()){
            return redirect('/admin/dashboard');
        }
        else{
            return view('admin/login');
        }
        
    }

    //process login input from user
    //redirect to dashboard if email and password are valid
    public function login(Request $request){
        if (Auth::user()){
            return redirect('/admin/dashboard');
        }
        else{
            $email = $request->email;
            $password = $request->password;
            if(Auth::attempt(['email' => $email, 'password' => $password])){
                return redirect('/admin/dashboard');
            }
            else{
                return redirect('/admin')->with('alert','Invalid Email or Password!');
            }
        }
    }

    //Show admin dashboard page
    //User will redirect to login page if not authenticated yet.
    public function dashboard(){
        if (Auth::user()){
           return view('admin/dashboard');
        }
        else{
            return redirect('/admin');
        }
    }

    //Process users logout
    public function logout(){
        if(Auth::user()){
            Auth::logout();
        }
        return redirect('/admin');
    }
}
