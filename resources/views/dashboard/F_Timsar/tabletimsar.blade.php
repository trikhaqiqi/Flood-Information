@extends('dashboard.dashboard')
    

@section('content')

<h3 class="ml-2 mb-3">Table Kontak Tim SAR</h3>
            <div class="card">
                <div class="card-header">Tabel Kontak Tim SAR Sekitar</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>#</th>
                            <th>Unit Koramil</th>
                            <th>Kontak</th>
                            <th>Alamat</th>
                            <th>Act</th>    
                        </tr>
                        @foreach ($sars as $index => $sar)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $sar->namatimsar }}</td>
                            <td>{{ $sar->notimsar }}</td>
                            <td>{{ $sar->alamat }}</td>
                            <td>                           
                            <form action="/sar/{{ $sar -> id }}" method="POST" class="">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                                <a href='/sar/{{ $sar -> id }}/edit' class="btn btn-info btn-sm mr-1">Edit</a>
                            </form>
                        </td>
                        </tr>
                        @endforeach 
                    </table>
                </div>
            </div>       
@endsection