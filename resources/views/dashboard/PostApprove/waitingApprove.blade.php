@extends('dashboard.dashboard')

@section('title', 'Unggahan')

@section('content')

<div class="card">
    <div class="card-header">Tabel post approved</div>
    <div class="card-body">
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Kategori Banjir</th>
                <th>location</th>
                <th>created</th>
                @can('update', $posts)
                    <th>Act</th>    
                @endcan
            </tr>
            @forelse ($posts as $index => $post) 
            <tr>
                <td>{{ $index  }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category->name }}</td>
                <td>{{ $post->location }}</td>
                <td>{{ $post->created_at }}</td>
                <td>
                <form action="/post/{{ $post -> id }}" method="POST" class="">
                    @csrf
                    @method('DELETE')
                    <a href='{{ route('post.show', $post->slug ) }}' class="btn btn-primary btn-sm mr-1">Show</a>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
            </tr>
            @empty
                
            @endforelse
        </table>
    </div>
</div>
    
@endsection