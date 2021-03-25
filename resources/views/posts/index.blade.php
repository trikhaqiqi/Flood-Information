@extends('layouts.app')
<link rel="stylesheet" href="style.css">

@section('title', 'Halaman Posts')
@section('content')
<div class="container mt-4">
    <div>
        <div>
            @isset($category)
            <h4>Kategori : {{$category->name}}</h4>
            @endisset

            @isset($tag)
            <h4>Penyebab : {{$tag->name}}</h4>
            @endisset

            @if(!isset($tag) && !isset($category))
            <h4>Semua Unggahan</h4>
            @endif
            <hr> 
        </div>
    </div>

    <div class="container col-6 float-right">
        <h4>Kontak Pertolongan Darurat :</h4>
        <hr>
        <ul class="list-group mb-2">
            <a href="/tni" class="list-group-item list-group-item-action">Tentara Nasional Indonesia (TNI)</a>
            <a href="/sar" class="list-group-item list-group-item-action">Search And Rescue (SAR)</a>
            <a href="/polsek" class="list-group-item list-group-item-action">Kepolisian Sekitar (Polsek)  </a>
        </ul>
        <h4>Forum :</h4>
        <hr>        
        <div class="mb-4">
            <div class="list-group">
                <a href="/telegram" class="list-group-item list-group-item-action">Telegram</a>
            </div>
        </div>
    </div>

    <div class="container mr-4">
        <!-- UNTUK MEMBAGI MENJADI BEBERAPA KELOMPONG MEMAKAI CHUNK -->
        @foreach($posts->chunk(1) as $postChunk) 
        <div class="col-6 ">
            @foreach ($postChunk as $post)
            <div class=" card mt-1 mb-1">
                @if($post->thumbnail)
                <a href="{{ route('post.show', $post->slug ) }}">
                    <img style="height: 35 0px;  object-fit: cover; object-position:center;" class="card-img-top p-0" src="/image/{{$post->thumbnail}}" alt="Card image cap">
                </a>
                @endif
                <div class="card-body ">
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
                        <div class="text-secondary">
                            <small>
                                Published on {{($post->created_at)->diffForHumans() }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach 
        </div>

    
        <div id="link" class="d-flex mt-3 mb-3">
            <div>
                {{ $posts->links()}}
            </div>
        </div>

    </div>
<div>
    @include('layouts.footer')
</div>

@endsection
