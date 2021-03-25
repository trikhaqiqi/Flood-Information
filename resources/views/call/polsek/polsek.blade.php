@extends('layouts.app')


@section('content')

<div class="container mt-4">
    <h1>Kontak Kepolisian</h1>
    <hr>
    <div class="card">
        <div class="card-header">Tabel Kontak Kepolisian</div>
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Unit Kepolisian</th>
                    <th>Kontak</th>
                    <th>Alamat</th>                    
                </tr>
                @foreach ($polseks as $index => $polsek)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $polsek->namapolsek }}</td>
                    <td>{{ $polsek->nopolsek }}</td>
                    <td>{{ $polsek->alamat }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

</div>

@endsection