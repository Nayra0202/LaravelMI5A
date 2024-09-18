@extends('layouts.main')

@section('content')
    <h4>Mahasiswa</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>NPM</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Tempat Lahir</th>
                <th>Email</th>
                <th>No Hp</th>
                <th>Alamat</th>
                <th>Prodi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $mahasiswas as $row )
            <tr>
                <td>{{ $row ['npm']}}</td>
                <td>{{ $row ['nama']}}</td>
                <td>{{ $row ['tanggal_lahir']}}</td>
                <td>{{ $row ['tempat_lahir']}}</td>
                <td>{{ $row ['email']}}</td>
                <td>{{ $row ['hp']}}</td>
                <td>{{ $row ['alamat']}}</td>
                <td>{{ $row ['prodi']['nama']}}</td>
                <td><a href="{{ route('mahasiswas.show', $row['id']) }}"
                class="btn btn-primary btn-xs">Show</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection