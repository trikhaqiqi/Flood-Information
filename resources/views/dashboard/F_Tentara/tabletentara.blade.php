@extends('dashboard.dashboard')
    

@section('content')

<h3 class="ml-2 mb-3">Table Kontak Koramil</h3>
            <div class="card">
                <div class="card-header">Tabel Kontak Koramil Sekitar</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>#</th>
                            <th>Unit Koramil</th>
                            <th>Kontak</th>
                            <th>Alamat</th>
                            <th>Act</th>    
                        </tr>
                        @foreach ($tentaras as $index => $tentara)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $tentara->namakoramil }}</td>
                            <td>{{ $tentara->nokoramil }}</td>
                            <td>{{ $tentara->alamat }}</td>
                            <td>                           
                            <form action="/tni/{{ $tentara -> id }}" method="POST" class="">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                                <a href='/tni/{{ $tentara -> id }}/edit' class="btn btn-info btn-sm mr-1">Edit</a>
                            </form>
                        </td>
                        </tr>
                        @endforeach 
                    </table>
                </div>
            </div>       
@endsection