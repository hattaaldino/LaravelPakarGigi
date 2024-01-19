<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hasil;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Kondisi;

class RiwayatController extends Controller
{
    public function view(Request $request){
        $offset = $request->input('offset') ?? 0;

        $get_gejala = Gejala::orderBy('kode_gejala')->get();

        $gejala_list = array();

        foreach($get_gejala as $key => $item){
            $argjl[$item->kode_gejala] = $item->nama_gejala;
        }

        $get_penyakit = Penyakit::orderBy('kode_penyakit')->get();

        foreach($get_penyakit as $key => $item){
            $arpkt[$item->kode_penyakit] = $item->nama_penyakit;
            $ardpkt[$item->kode_penyakit] = $item->det_penyakit;
            $arspkt[$item->kode_penyakit] = $item->srn_penyakit;
        }

        $hasil = Hasil::offset($offset)
                                ->limit(15)
                                ->orderBy('id_hasil')
                                ->get();

        $get_hasil_count = Hasil::selectRaw('hasil_id, count(hasil_id) as jlh_id')
                      ->groupBy('hasil_id')
                      ->orderBy('jlh_id', 'desc')
                      ->get();
        
        $arr = array();

        foreach($get_hasil_count as $key => $item){
           if($item->hasil_id > 0){
            $hasil_count[] = array(
                'label' => '&nbsp;' . $arpkt[$item->hasil_id],
                'data' => array(array('Penyakit ' . $item->hasil_id, $item->jlh_id))
            );
           }
        }

        $total_data = Hasil::count();

        return view('riwayat.riwayat',[
            'hasil' => $hasil,
            'arr' => $hasil_count,
            'arpkt' => $arpkt,
            'offset' => $offset,
            'baris' => $total_data,
        ]);
    }

    public function detail(Request $request, $id_hasil){
        $id = $request->input('id_hasil');

        $get_kondisi = Kondisi::orderBy('id')->get();

        $get_kondisi.each(function($item, $key){
            $arkondisitext[$item->id] = $item->kondisi;
        });

        $get_kondisi.each(function($item, $key){
            $arkondisitext[$item->id] = $item->kondisi;
        });

        $get_gejala = Gejala::orderBy('kode_gejala')->get();

        $gejala_list = array();

        foreach($get_gejala as $key => $item){
            $gejala_list[$item->kode_gejala] = $item->nama_gejala;
        }

        $get_penyakit = Penyakit::orderBy('kode_penyakit')->get();

        foreach($get_penyakit as $key => $item){
            $arpkt[$item->kode_penyakit] = $item->nama_penyakit;
            $ardpkt[$item->kode_penyakit] = $item->det_penyakit;
            $arspkt[$item->kode_penyakit] = $item->srn_penyakit;
            $argpkt[$item->kode_penyakit] = $item->gambar;
        }

        $get_hasil = Hasil::where('id_hasil', $id)->get();

        $arpenyakit = array();
        $argejala = array();
        $get_hasil.each(function($item, $key){
            $arpenyakit[] = unserialize($item->penyakit);
            $argejala[] = unserialize($item->gejala);
        });

        return view('riwayat.detail', [
            'arkondisitext' => $arkondisitext,
            'arpenyakit' => $arpenyakit,
            'gejala_list' => $gejala_list,
            'argejala' => $argejala,
            'arpkt' => $arpkt,
            'ardpkt' => $ardpkt,
            'arspkt' => $arspkt,
            'argpkt' => $argpkt,
        ]);
    }
}
