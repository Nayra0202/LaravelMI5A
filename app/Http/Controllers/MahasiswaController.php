<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Panggil model fakultas
        $result = Mahasiswa::all();
        //dd($result);

        //kirim data $result ke views fakultas index.php
        return view('mahasiswa.index')->with('mahasiswa', $result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $result = Prodi::all();
        return view(view: 'mahasiswa.create')->with('prodi', $result);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        //validasi input sblm simpan
        $input = $request->validate( [
            "npm" => "required|unique:mahasiswas",
            "nama" => "required",
            "tanggal_lahir" => "required",
            "tempat_lahir"   => "required",
            "email" => "required",
            "hp" => "required",
            "alamat" => "required",
            "prodi_id" => "required"
        ]);

        //simpan
        Mahasiswa::create($input);

        //redirect beserta pesan success
        return redirect()->route('mahasiswas.index')->with('success',
        $request->nama.' berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //dd($mahasiswa);
        return view('mahasiswa.show')->with('mahasiswa', $mahasiswa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //cari data di tabel fakultas berdasarkan "id" fakultas
        $mahasiswa = Mahasiswa::find($id);
        //dd($fakultas);
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index')->with('success', "Data Fakultas berhasil dihapus");
    }

    public function getMahasiswa(){
        $response['data'] = Mahasiswa::with('prodi.fakultas')->get();
        $response['message'] = 'List data mahasiswa';
        $response['success'] = true;

        return response()->json($response, 200);
    }

    public function storeMahasiswa(Request $request)
    {
        $input = $request->validate( [
            "npm" => "required|unique:mahasiswas",
            "nama" => "required",
            "tanggal_lahir" => "required",
            "tempat_lahir"   => "required",
            "email" => "required",
            "hp" => "required",
            "alamat" => "required",
            "prodi_id" => "required",
            "foto"  =>"nullable|image|mimes:jpg.jpeg.png.webp|max:2048"
        ]);

        if($request->hasFile('foto')){
            //upload foto ke folder 'image'
            $fotopath = $request->file('foto')->store('images','public');
            //Menambahkan path foto ke input data
            $input['foto'] = $fotopath;
        }

        //simpan
        Mahasiswa::create($input);
        $hasil = Mahasiswa::create($input);
        if($hasil){ //jika data berhasil disimpan
            $response['success'] = true;
            $response['message'] = $request->nama."berhasil disimpan";
            return response()->json($response, 201); //201 utk created 
        }else {
            $response['success'] = false;
            $response['message'] = $request->nama."gagal disimpan";
            return response()->json($response, 400); //400 Bad Request
        }
    }
}
