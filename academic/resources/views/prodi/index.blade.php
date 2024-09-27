@extends('layouts.main')

@section('content')
    <h4>Prodi</h4>
    <a href="{{ route('prodi.create') }}" class="btn btn-primary">Tambah</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama Program Studi</th>
                <th>KaProdi</th>
                <th>Singkatan</th>
                <th>Fakultas</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>

            @foreach ( $prodi as $row )
            <tr>
                <td>{{ $row ['nama']}}</td>
                <td>{{ $row ['kaprodi']}}</td>
                <td>{{ $row ['singkatan']}}</td>
                <td>{{ $row ['fakultas']['nama']}}</td>
                <td><a href="{{ route('prodi.edit', $row['id'])}}" class="btn btn-xs btn-warning">Ubah</a></td>
            </tr>
            @endforeach

        </tbody>
    </table>
@endsection