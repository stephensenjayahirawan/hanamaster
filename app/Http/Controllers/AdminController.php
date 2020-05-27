<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //Show Login Page
    public function index(){
        return view('admin/login');
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $data = Admin::where('email',$email)->first();
        if($data){
            if(Hash::check($password,$data->password)){
                Session::put('name',$data->name);
                Session::put('email',$data->email);
                Session::put('login',TRUE);
                echo "sukses";
            }
            else{
                return redirect('/admin')->with('alert','Invalid Password!');
            }
        }
        else{
            return redirect('/admin')->with('alert','Invalid Email!');
        }
    }

    public function addAdmin(){
        $data =  new Admin();
        $data->name = "Hengky";
        $data->email = "hengky@gmail2.com";
        $data->password = bcrypt("123");
        $data->save();
    }
}
