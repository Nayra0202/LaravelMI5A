<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use View;

class DashboardController extends Controller
{
    public function index() {
        $mahasiswa = DB::select
        ('SELECT prodi.nama, COUNT(*) as jumlah 
            FROM mahasiswas
            JOIN prodi ON mahasiswas.prodi_id = prodi.id
            GROUP BY prodi.nama');

        $mahasiswa_tempat_lahir = DB::select
        ('SELECT mahasiswas.tempat_lahir, COUNT(*) as jumlah 
                 FROM mahasiswas
                 GROUP BY mahasiswas.tempat_lahir ');
        return view('dashboard')
            ->with('mahasiswa', $mahasiswa)
            ->with('mahasiswa_tempat_lahir', $mahasiswa_tempat_lahir);
    }
}
