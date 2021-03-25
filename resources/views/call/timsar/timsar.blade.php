@extends('layouts.app')


@section('content')

<div class="container mt-4">
    <h1>Kontak Search And Resque</h1>
    <hr>
    <div class="card">
        <div class="card-header">Tabel Kontak Search And Resque Sekitar</div>
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Unit Tim SAR Sekitar</th>
                    <th>Kontak</th>
                    <th>Alamat</th>
                </tr>
                @foreach ($sars as $index => $sar)    
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $sar->namatimsar }}</td>
                    <td>{{ $sar->notimsar }}</td>
                    <td>{{ $sar->alamat }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

</div>

@endsection