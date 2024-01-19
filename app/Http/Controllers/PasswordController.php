<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class PasswordController extends Controller
{
    public function view(Request $request){
        if(session()->has('username') && session()->has('password')){
            return view('password');
        }
        else {
            return view('unauthorized-user');
        }
    }

    public function update(Request $request){
        $input = $request->all();

        $user = Admin::where('username', $input['nama'])->first();

        if($user->password == md5($input['oldPass'])){
            if($input['newPass1'] == $input['newPass2']){
                $updated_user = Admin::where('username', $input['nama'])
                                     ->update([
                                        'password' => md5($input['newPass1'])
                                    ]);
                
                if($updated_user)
                    return view('password', ['status', 'Password berhasil diubah']);
                else 
                    return view('password', ['status', 'Terjadi error! harap coba lagi']);
            }
            else
                return view('password', ['status', 'Password baru Anda tidak sama']);
        }
        else
            return view('password', ['status', 'Password lama Anda salah']);
    }
}
