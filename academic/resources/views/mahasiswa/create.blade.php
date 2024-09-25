@extends('layouts.main')

@section('content')
    <h4>Mahasiswa</h4>
    <form action="{{ route('mahasiswas.store') }}" method="post">
        @csrf
        Npm
        @error('npm')
        {{$message}}
        @enderror
        <input type="text" name="npm" id="" class="form-control mb-2">

        Nama
        @error('nama')
        {{$message}}
        @enderror
        <input type="text" name="nama" id="" class="form-control mb-2">

        Tanggal Lahir
        @error('tanggal_lahir')
        {{$message}}
        @enderror
        <input type="date" name="tanggal_lahir" id="" class="form-control mb-2">

        Tempat Lahir
        @error('tempat_lahir')
        {{$message}}
        @enderror
        <input type="text" name="tempat_lahir" id="" class="form-control mb-2">

        Email
        @error('email')
        {{$message}}
        @enderror
        <input type="text" name="email" id="" class="form-control mb-2">

        HP
        @error('hp')
        {{$message}}
        @enderror
        <input type="text" name="hp" id="" class="form-control mb-2">

        Alamat
        @error('hp')
        {{$message}}
        @enderror
        <input type="text" name="alamat" id="" class="form-control mb-2">
        Prodi
        @error('prodi_id')
            <span class="text-danger">({{ $message }})</span>
        @enderror
        <select name="prodi_id" class="form-control">
            @foreach ($prodi as $item)
                <option value="{{ $item['id'] }}"> {{ $item['nama']}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection