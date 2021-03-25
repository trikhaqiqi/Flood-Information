@extends('layouts.app')


@section('content')
<div class="container">
    <div class="container mt-4">
        <div class="col-sm-7 float-left mt-4">
            <div>
                <div class="">
                    <h1><strong>{{ ucfirst($post->title) }}</strong></h1>
                </div>
                <div class="text-secondary p-0 mb-3">
                    <a style="text-decoration: none" class="text-secondary" href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
                    &middot; {{ $post->created_at->format("d F, Y")}}
                    &middot;
                    @foreach($post->tags as $tag)
                    <a style="text-decoration: none" class="text-secondary" href="/tags/{{$tag->slug}}">{{$tag->name}}</a>
                    @endforeach
                    <div class="media my-3">
                        <img width="60" class="rounded-circle mr-3" src="{{ $post->author->gravatar()}}" alt="">
                        <div class="media-body">
                            {{ $post->author->name }}
                            <br>
                            {{ '@' . $post->author->username }}
                        </div>
                    </div>
                </div>
                <div>
                    <img style="height: 500px; object-fit: cover; object-position:center;" class="card-img-top mb-2" src="/image/{{$post->thumbnail}}">
                </div>
                <div class="mb-5">
                    {!! nl2br($post->subject) !!}
                </div>
            </div>

            <div>
                <!-- Button trigger modal -->
                @can('delete', $post)
                <button type="button" class="btn btn-danger btn-sm float-right ml-1 mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Delete
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin akan menghapusnya ?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-2">
                                    <div>{{ $post->title}}</div>
                                    <div class="text-secondary">
                                        <small>Published : {{ $post->created_at->format("d F, Y")}}</small>
                                    </div>
                                </div>
                                <form action="/post/{{$post->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="d-flex float-right mt-3">
                                        <button class="btn btn-danger mr-1" type="submit">Ya</button>
                                        <button type="button" class="btn btn-sm btn-success" data-bs-dismiss="modal">Tidak</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endcan

                @can('update', $post)
                <a href='/post/{{$post->id}}/edit' class="btn btn-warning text-white btn-sm float-right ml-1 mb-5">Edit</a>
                @endcan
            </div>
        </div>

        <a href="/post" class="btn btn-sm btn-info text-white float-right mb-5 ">Back</a>

        <div class="container">
            <div class="col-sm-4 form-group float-right mt-5 mb-5 mr-5">
                <div class="">
                    <h4>Lokasi banjir :</h4>
                    <div class="text-secondary mb-2">
                        Titik Koordinat : {{$post->location}}
                        <hr>
                    </div>
                    <div>
                        @include('maps.mapSingle')
                    </div>
                    <div class=" mb-1 mt-1 ">
                        <h4>Berita lainnya :</h4>
                        <hr>
                    </div>
                    @foreach($posts as $post)
                    <div>
                        <div class=" card mt-1 mb-1 mt-2">
                            <div class="card-body">
                                <div>
                                    <a style="text-decoration: none" href="{{ route('categories.show', $post->category->slug) }}" class="text-secondary">
                                        <small>{{ $post->category->name }}</small>
                                    </a>
                                    @foreach($post->tags as $tag)
                                    <a style="text-decoration: none" href="{{ route('tags.show', $tag->slug) }}" class="text-secondary">
                                        <small>{{ $tag->name  }} - </small>
                                    </a>
                                    @endforeach
                                </div>
                                <h5>
                                    <a style="text-decoration: none" class="text-dark" href="{{ route('post.show', $post->slug ) }}" class="card-title">
                                        <strong>{{ ucfirst($post->title) }}</strong>
                                    </a>
                                </h5>
                                <div class="text-secondary my-1">
                                    <p>{{ Str::limit($post->subject, 120, '.') }}
                                </div>
                                <div class=" d-flex justify-content-between align-items-center  mt-2">
                                    <div class="media align-items-center">
                                        <img width="40" class="rounded-circle mr-3" src="{{ $post->author->gravatar()}}" alt="">
                                        <div class="media-body">
                                            {{ $post->author->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
