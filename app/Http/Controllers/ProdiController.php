<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Panggil model fakultas
        $result = Prodi::all();
        //dd($result);

        //kirim data $result ke views fakultas index.php
        return view('prodi.index')->with('prodi', $result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        return view(view: 'prodi.create')->with('fakultas', $fakultas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        //validasi input sblm simpan
        $input = $request->validate( [
            "nama" => "required|unique:prodi",
            "kaprodi" => "required",
            "singkatan" => "required",
            "fakultas_id"   => "required"
        ]);

        //simpan
        Prodi::create($input);

        //redirect beserta pesan success
        return redirect()->route('prodi.index')->with('success',
        $request->nama.' berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $prodi = Prodi::find($id);
        $fakultas = Fakultas::all();
        return view('prodi.edit')
            ->with('prodi', $prodi)
            ->with('fakultas',$fakultas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $prodi= Prodi::find($id);
        //dd($prodi);
        //validasi input sblm simpan
        $input = $request->validate( [
            "nama" => "required",
            "kaprodi" => "required",
            "singkatan" => "required",
            "fakultas_id" => "required"
        ]);

        //update data
        $prodi->update($input);

        //redirect beserta pesan success
        return redirect()->route('prodi.index')->with('success',
        $request->nama.' berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //cari data di tabel fakultas berdasarkan "id" fakultas
        $prodi = Prodi::find($id);
        //dd($fakultas);
        $prodi->delete();
        return redirect()->route('prodi.index')->with('success', "Data Fakultas berhasil dihapus");
    }

     public function getProdi(){
        //$response['data'] = Prodi::all();
        $response['data'] = Prodi::with('fakultas')->get();
        $response['message'] = 'List data prodi';
        $response['success'] = true;

        return response()->json($response, 200);
    }

        public function storeProdi(Request $request) {
        $input = $request->validate( [
            "nama" => "required",
            "kaprodi" => "required",
            "singkatan" => "required",
            "fakultas_id" => "required"
        ]);

        //simpan
        $hasil = Prodi::create($input);
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
