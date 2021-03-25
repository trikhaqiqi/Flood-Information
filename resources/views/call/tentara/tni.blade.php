@extends('layouts.app')


@section('content')

<div class="container mt-4">
    <h1>Kontak Koramil</h1>
    <hr>
    <div class="card">
        <div class="card-header">Tabel Kontak Koramil</div>
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Unit Koramil Sekitar</th>
                    <th>Kontak</th>
                    <th>Alamat</th>
                </tr>
                @foreach ($tentaras as $index => $tentara)    
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $tentara->namakoramil }}</td>
                    <td>{{ $tentara->nokoramil }}</td>
                    <td>{{ $tentara->alamat }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

</div>

@endsection