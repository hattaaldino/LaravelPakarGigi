<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;

class GejalaController extends Controller
{
    public function view(Request $request){
        $keyword = $request->input('keyword');
        $offset = $request->input('offset') ?? 0;

        if($keyword){
            $gejala = Gejala::where('nama_gejala','LIKE','%'.$keyword.'%')->get();
        }
        else{
            $gejala = Gejala::offset($offset)
                                ->limit(15)
                                ->orderBy('kode_gejala')
                                ->get();
        }

        $total_data = Gejala::count();

        return view('gejala.gejala',[
            'gejala' => $gejala,
            'keyword' => $keyword,
            'offset' => $offset,
            'baris' => $total_data,
        ]);
    }

    public function add_view(Request $request){
        return view('gejala.tambah-gejala');
    }

    public function update_view(Request $request, $kode_gejala){

        $gejala = Gejala::where('kode_gejala', $kode_gejala)
                      ->first();
        
        return view('gejala.edit-gejala', [
            'kode_gejala' => $gejala->kode_gejala,
            'nama_gejala' => $gejala->nama_gejala,
        ]);
    }

    public function add(Request $request){

        $nama_gejala = $request->input('nama_gejala');

        $gejala = Gejala::create([
                            'nama_gejala' => $nama_gejala
                        ]);
        
        return redirect()->route('gejala');
    }

    public function update(Request $request){

        $kode_gejala = $request->input('kode_gejala');
        $nama_gejala = $request->input('nama_gejala');

        $gejala = Gejala::where('kode_gejala', $kode_gejala)
                        ->update([
                            'kode_gejala' => $kode_gejala,
                            'nama_gejala' => $nama_gejala,
                        ]);
        
        return redirect()->route('gejala');
    }

    public function delete(Request $request, $kode_gejala){

        $gejala = Gejala::where('kode_gejala', $kode_gejala)->delete();
        
        return redirect()->route('gejala');
    }
}
