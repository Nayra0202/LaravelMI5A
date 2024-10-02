<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class DashboardController extends Controller
{
    public function index() {
        $mahasiswas = DB::select
        ('SELECT prodi.nama, COUNT(*) as jumlah 
            FROM mahasiswas
            JOIN prodi ON mahasiswas.prodi_id = prodi_id
            GROUP BY prodi.nama');
        return view('dashboard')->with('mahasiswa', $mahasiswas);
    }
}
