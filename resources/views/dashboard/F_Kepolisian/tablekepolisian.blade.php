@extends('dashboard.dashboard')
    

@section('content')

<h3 class="ml-2 mb-3">Table Kontak Kepolisian</h3>
            <div class="card">
                <div class="card-header">Tabel Kontak Kepolisian</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>#</th>
                            <th>Nama Kepolisian</th>
                            <th>Kontak</th>
                            <th>Alamat</th>
                            @can('update', $polseks)
                                <th>Act</th>    
                            @endcan
                            
                        </tr>
                        @foreach ($polseks as $index => $polsek)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $polsek->namapolsek }}</td>
                            <td>{{ $polsek->nopolsek }}</td>
                            <td>{{ $polsek->alamat }}</td>
                            <td>

                            
                            
                            <form action="/kepolisian/{{ $polsek -> id }}" method="POST" class="">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                                <a href='/kepolisian/{{ $polsek -> id }}/edit' class="btn btn-info btn-sm mr-1">Edit</a>
                            </form>
                        </td>
                        </tr>
                        @endforeach


                        
                    </table>
                </div>
            </div>
        
        
@endsection