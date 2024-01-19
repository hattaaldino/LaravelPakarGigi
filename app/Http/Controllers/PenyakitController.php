<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyakit;

class PenyakitController extends Controller
{
    public function view(Request $request){
        $keyword = $request->input('keyword');
        $offset = $request->input('offset') ?? 0;

        if($keyword){
            $penyakit = Penyakit::where('nama_penyakit','LIKE','%'.$keyword.'%')->get();
        }
        else{
            $penyakit = Penyakit::offset($offset)
                                ->limit(15)
                                ->orderBy('kode_penyakit')
                                ->get();
        }

        $total_data = Penyakit::count();

        return view('penyakit.penyakit',[
            'penyakit' => $penyakit,
            'keyword' => $keyword,
            'offset' => $offset,
            'baris' => $total_data,
        ]);
    }

    public function add_view(Request $request){
        return view('penyakit.tambah-penyakit');
    }

    public function update_view(Request $request, $kode_penyakit){

        $penyakit = Penyakit::where('kode_penyakit', $kode_penyakit)
                      ->first();
        
        return view('penyakit.edit-penyakit', [
            'kode_penyakit' => $penyakit->kode_penyakit,
            'nama_penyakit' => $penyakit->nama_penyakit,
            'det_penyakit' => $penyakit->det_penyakit,
            'srn_penyakit' => $penyakit->srn_penyakit,
            'gambar' => $penyakit->gambar,
        ]);
    }

    public function add(Request $request){

        $nama_penyakit = $request->input('nama_penyakit');
        $det_penyakit = $request->input('det_penyakit');
        $srn_penyakit = $request->input('srn_penyakit');

        if($request->hasFile('gambar')){
            $filename = $request->file('gambar')->getClientOriginalName();

            $upload = $request->file('gambar')->storeAs('gambar/penyakit/');
        }

        $penyakit = Penyakit::create([
                            'nama_penyakit' => $nama_penyakit,
                            'det_penyakit' => $det_penyakit,
                            'srn_penyakit' => $srn_penyakit,
                            'gambar' => $filename ?? NULL,
                        ]);
        
        return redirect()->route('penyakit');
    }

    public function update(Request $request){
        $kode_penyakit = $request->input('kode_penyakit');
        $nama_penyakit = $request->input('nama_penyakit');
        $det_penyakit = $request->input('det_penyakit');
        $srn_penyakit = $request->input('srn_penyakit');

        if($request->hasFile('gambar')){
            $filename = $request->file('gambar')->getClientOriginalName();

            $upload = $request->file('gambar')->storeAs('gambar/penyakit/');
        }

        $penyakit = Penyakit::where('kode_penyakit', $kode_penyakit)
                             ->update([
                                'nama_penyakit' => $nama_penyakit,
                                'det_penyakit' => $det_penyakit,
                                'srn_penyakit' => $srn_penyakit,
                                'gambar' => $filename ?? NULL,
                             ]);
        
        return redirect()->route('penyakit');
    }

    public function delete(Request $request, $kode_penyakit){

        $penyakit = Penyakit::where('kode_penyakit', $kode_penyakit)->delete();
        
        return redirect()->route('penyakit');
    }
}
