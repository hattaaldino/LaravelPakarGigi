<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AuthController extends Controller
{
    public function login_view(Request $request){
        return view("login");
    }

    public function login(Request $request){
        $input_username = $request->input('username');
        $input_password = $request->input('password');

        $password = md5($input_password);

        $admin = Admin::where('username', $input_username)
                      ->where('password', $password)
                      ->first();
        
        if($admin){
            $username = $admin->username;
            $password = $admin->password;
            $nama_lengkap = $admin->nama_lengkap;
            
            session([
                'username' => $username,
                'password' => $password,
                'nama_lengkap' => $nama_lengkap,
            ]);

            return redirect()->route('dashboard');
        }
        else{
            return view('error/login-error');
        }
    }

    public function logout(Request $request){
        $request->session()->flush();

        return redirect()->route('dashboard');
    }
}
