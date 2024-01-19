<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala; 
use App\Models\Penyakit;
use App\Models\BasisPengetahuan;
use App\Models\Admin;

class DashboardController extends Controller
{
    public function view (Request $request){
        $total_gejala = Gejala::count();
        $total_penyakit = Penyakit::count();
        $total_pengetahuan = BasisPengetahuan::count();
        $total_admin = Admin::count();

        $data = array(
            'total_gejala' => $total_gejala,
            'total_penyakit' => $total_penyakit,
            'total_pengetahuan' => $total_pengetahuan,
            'total_admin' => $total_admin,
        );

        return view('dashboard')
                   ->with(
                       'data', $data
                     );
    }
}
