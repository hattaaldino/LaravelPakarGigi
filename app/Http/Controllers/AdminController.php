<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function view(Request $request){
        $keyword = $request->input('keyword');
        $offset = $request->input('offset') ?? 0;

        if($keyword){
            $admin = Admin::where('username','LIKE','%'.$keyword.'%')->get();
        }
        else{
            $admin = Admin::offset($offset)
                                ->limit(10)
                                ->orderBy('username')
                                ->get();
        }

        $total_data = Admin::count();

        return view('admin.admin',[
            'admin' => $admin,
            'keyword' => $keyword,
            'offset' => $offset,
            'baris' => $total_data,
        ]);
    }

    public function add_view(Request $request){
        return view('admin.tambah-admin');
    }

    public function update_view(Request $request, $username){

        $admin = Admin::where('username', $username)
                      ->first();
        
        return view('admin.edit-admin', [
            'username' => $admin->username,
            'nama_lengkap' => $admin->nama_lengkap,
        ]);
    }

    public function add(Request $request){

        $username = $request->input('username');
        $nama_lengkap = $request->input('nama_lengkap');
        $password = md5($request->input('password'));

        $admin = Admin::create([
                            'username' => $username,
                            'nama_lengkap' => $nama_lengkap,
                            'password' => $password,
                        ]);
        
        return redirect()->route('admin');
    }

    public function update(Request $request){

        $username = $request->input('username');
        $nama_lengkap = $request->input('nama_lengkap');

        $admin = Admin::where('username', $username)
                      ->update([
                            'username' => $username,
                            'nama_lengkap' => $nama_lengkap,
                        ]);
        
        return redirect()->route('admin');
    }

    public function delete(Request $request, $username){

        $admin = Admin::where('username', $username)->delete();
        
        return redirect()->route('admin');
    }
}
