<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\Kondisi;
use App\Models\Penyakit;
use App\Models\Hasil;
use App\Models\BasisPengetahuan;

class DiagnosisController extends Controller
{
    public function view(Request $request){
        $gejala = Gejala::orderBy('nama_gejala')
                        ->get(['kode_gejala', 'nama_gejala']);
        
        $kondisi = Kondisi::orderBy('id')
                          ->get(['id', 'kondisi']);
                    
        return view('diagnosis.diagnosis',[
            'gejala' => $gejala,
            'kondisi' => $kondisi
        ]);
    }

    public function diagnosis(Request $request){
        date_default_timezone_set("Asia/Jakarta");
        $inptanggal = date('Y-m-d H:i:s');

        $arbobot = array('0', '1', '0.8', '0.6', '0.4', '0.2');
        $argejala = array();

        $kondisi = $request->input('kondisi');

        for ($i = 0; $i < count($kondisi); $i++) {
            $arkondisi = explode("_", $kondisi[$i]);
            if (strlen($kondisi[$i]) > 1) {
            $argejala += array($arkondisi[0] => $arkondisi[1]);
            }
        }

        $get_kondisi = Kondisi::orderBy('id')->get();

        foreach($get_kondisi as $key => $item){
            $arkondisitext[$item->id] = $item->kondisi;
        }

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

        $arpenyakit = array();

        foreach($get_penyakit as $key => $item){
            $cftotal_temp = 0;
            $cf = 0;
            $gejala_by_penyakit = BasisPengetahuan::where('kode_penyakit', '=', $item->kode_penyakit)->get();
            $cflama = 0;
            foreach($gejala_by_penyakit as $gejala_key => $gejala_item){
                $arkondisi = explode("_", $kondisi[0]);
                $gejala = $arkondisi[0];

                for ($i = 0; $i < count($kondisi); $i++) {
                    $arkondisi = explode("_", $kondisi[$i]);
                    $gejala = $arkondisi[0];
                    if ($gejala_item->kode_gejala == $gejala) {
                        $cf = ($gejala_item->mb - $gejala_item->md) * $arbobot[$arkondisi[1]];
                        if (($cf >= 0) && ($cf * $cflama >= 0)) {
                            $cflama = $cflama + $cf - ($cflama*$cf);
                        }
                        if ($cf * $cflama < 0) {
                            $cflama = ($cflama + $cf) / (1 - Math . Min(Math . abs($cflama), Math . abs($cf)));
                        }
                        if (($cf < 0) && ($cf * $cflama >= 0)) {
                            $cflama = $cflama + ($cf * (1 + $cflama));
                        }
                    }
                }
            }
            if ($cflama > 0) {
                $arpenyakit += array($item->kode_penyakit => number_format($cflama, 4));
            }
        }

        arsort($arpenyakit);

        $inpgejala = serialize($argejala);
        $inppenyakit = serialize($arpenyakit);

        $np1 = 0;
        $idpkt1 = array();
        $vlpkt1 = array();
        foreach ($arpenyakit as $key1 => $value1) {
            $np1++;
            $idpkt1[$np1] = $key1;
            $vlpkt1[$np1] = $value1;
        }

        $insert_hasil = Hasil::create([
            'tanggal' => $inptanggal,
            'gejala' => $inpgejala,
            'penyakit' => $inppenyakit,
            'hasil_id' => empty($idpkt1) ? 0 : $idpkt1[1],
            'hasil_nilai' => empty($vlpkt1) ? 0 : $vlpkt1[1],
        ]);

        return view('diagnosis.hasil-diagnosis', [
            'argejala' => $argejala,
            'arkondisitext' => $arkondisitext,
            'gejala_list' => $gejala_list,
            'arpenyakit' => $arpenyakit,
            'arpkt' => $arpkt,
            'ardpkt' => $ardpkt,
            'arspkt' => $arspkt,
            'argpkt' => $argpkt,
        ]);
    }

}
