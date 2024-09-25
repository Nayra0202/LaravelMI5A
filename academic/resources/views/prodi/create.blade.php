@extends('layouts.main')

@section('content')
    <h4>Prodi</h4>
    <form action="{{ route('prodi.store') }}" method="post">
        @csrf
        Nama
        @error('nama')
{{$message}}
        @enderror
        <input type="text" name="nama" id="" class="form-control mb-2">
        KaProdi
                @error('kaprodi')
{{$message}}
        @enderror
        <input type="text" name="kaprodi" id="" class="form-control mb-2">
        Singkatan
                @error('singkatan')
{{$message}}
        @enderror
        <input type="text" name="singkatan" id="" class="form-control mb-2">
        Fakultas
        @error('fakultas_id')
            <span class="text-danger">({{ $message }})</span>
        @enderror
        <select name="fakultas_id" class="form-control">
            @foreach ($fakultas as $item)
                <option value="{{ $item['id'] }}"> {{ $item['nama']}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection