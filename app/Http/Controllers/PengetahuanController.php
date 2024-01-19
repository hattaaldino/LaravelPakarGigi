<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BasisPengetahuan;
use App\Models\Penyakit;
use App\Models\Gejala;

class PengetahuanController extends Controller
{
    public function view(Request $request){
        $keyword = $request->input('keyword');
        $offset = $request->input('offset') ?? 0;

        if($keyword){
            $pengetahuan = BasisPengetahuan::join('penyakit', 'basis_pengetahuan.kode_penyakit', '=', 'penyakit.kode_penyakit')
                                           ->join('gejala', 'basis_pengetahuan.kode_gejala', '=', 'gejala.kode_gejala')
                                           ->where('penyakit.nama_penyakit','LIKE','%'.$keyword.'%')
                                           ->get();
        }
        else{
            $pengetahuan = BasisPengetahuan::join('penyakit', 'basis_pengetahuan.kode_penyakit', '=', 'penyakit.kode_penyakit')
                                           ->join('gejala', 'basis_pengetahuan.kode_gejala', '=', 'gejala.kode_gejala')
                                           ->offset($offset)
                                           ->limit(15)
                                           ->orderBy('kode_pengetahuan')
                                           ->get();
        }

        $total_data = BasisPengetahuan::count();

        return view('pengetahuan.pengetahuan',[
            'pengetahuan' => $pengetahuan,
            'keyword' => $keyword,
            'offset' => $offset,
            'baris' => $total_data,
        ]);
    }

    public function add_view(Request $request){
        $penyakit = Penyakit::orderBy('nama_penyakit')
                            ->get(['kode_penyakit', 'nama_penyakit']);
        
        $gejala = Gejala::orderBy('nama_gejala')
                        ->get(['kode_gejala', 'nama_gejala']);

        return view('pengetahuan.tambah-pengetahuan',[
            'penyakit' => $penyakit,
            'gejala' => $gejala,
        ]);
    }

    public function update_view(Request $request, $kode_pengetahuan){

        $pengetahuan = BasisPengetahuan::where('kode_pengetahuan', $kode_pengetahuan)
                      ->first();

        $penyakit = Penyakit::orderBy('nama_penyakit')
                            ->get(['kode_penyakit', 'nama_penyakit']);
        
        $gejala = Gejala::orderBy('nama_gejala')
                        ->get(['kode_gejala', 'nama_gejala']);

        return view('pengetahuan.edit-pengetahuan', [
            'kode_pengetahuan' => $pengetahuan->kode_pengetahuan,
            'kode_penyakit' => $pengetahuan->kode_penyakit,
            'kode_gejala' => $pengetahuan->kode_gejala,
            'mb' => $pengetahuan->mb,
            'md' => $pengetahuan->md,
            'penyakit' => $penyakit,
            'gejala' => $gejala,
        ]);
    }

    public function add(Request $request){

        $kode_penyakit = $request->input('kode_penyakit');
        $kode_gejala = $request->input('kode_gejala');
        $mb = $request->input('mb');
        $md = $request->input('md');

        $pengetahuan = BasisPengetahuan::create([
                            'kode_penyakit' => $kode_penyakit,
                            'kode_gejala' => $kode_gejala,
                            'mb' => $mb,
                            'md' => $md,
                        ]);
        
        return redirect()->route('pengetahuan');
    }

    public function update(Request $request){
        $kode_pengetahuan = $request->input('kode_pengetahuan');
        $kode_penyakit = $request->input('kode_penyakit');
        $kode_gejala = $request->input('kode_gejala');
        $mb = $request->input('mb');
        $md = $request->input('md');

        $pengetahuan = BasisPengetahuan::where('kode_pengetahuan', $kode_pengetahuan)
                                       ->update([
                                            'kode_penyakit' => $kode_penyakit,
                                            'kode_gejala' => $kode_gejala,
                                            'mb' => $mb,
                                            'md' => $md,
                                        ]);
        
        return redirect()->route('pengetahuan');
    }

    public function delete(Request $request, $kode_pengetahuan){

        $pengetahuan = BasisPengetahuan::where('kode_pengetahuan', $kode_pengetahuan)->delete();
        
        return redirect()->route('pengetahuan');
    }
}
